<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;
use View;
use Log;
use DB;
use Exception;
use Auth;

class MemoController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $memo = $this->InvoiceMemo->with('customer:id,name as customer_name')->orderBy('id', 'DESC');
            $memo = $memo->paginate(100);
            return response()->json([
                View::make('admin.memo.data', compact('memo'))->render()
            ]);
        }
        return view('admin.memo.index');
    }

    public function add()
    {
        $statement = DB::select("SHOW TABLE STATUS LIKE 'invoice_memo'");
        //Display prefix 0 for complete 8 digit code
        $nextId = str_pad($statement[0]->Auto_increment, 8, '0', STR_PAD_LEFT);
        $customers = $this->Customer->get()->pluck('name', 'id');
        $country = $this->Country->get()->pluck('name', 'id');
        return view('admin.memo.create', compact(['nextId', 'customers', 'country']));
    }

    public function getGiaDetails($type)
    {
        if ($type == 1) {
            $data = $this->Gia->get();
        } else {
            $data = $this->Nogia->get();
        }
        return ['status' =>  true, 'data' => $data];
    }

    /**
     * add/edit memo invoice
     */
    public function saveInvoice(Request $request)
    {
        if ($request->invoice_id) {
            $invoice = $this->InvoiceMemo->whereId($request->invoice_id)->first();
        } else {
            $invoice = $this->InvoiceMemo;
            $invoice->create_by = Auth::user()->id;
        }
        $invoice->customer_id = $request->customer_id;
        $invoice->reference = $request->reference;
        $invoice->unit_price = $request->single_unit_price;
        $invoice->rate = $request->rate;
        $invoice->country_id = $request->country;
        $invoice->date = Carbon::parse($request->date)->format('Y-m-d');
        $invoice->payment_in = $this->getCurrency($request->country);
        $invoice->carat_total = $request->carat_total;
        $invoice->total = $request->due_total;
        if ($request->is_edit) {
            $invoice->sold_carat_total = $request->sold_carat_total;
            $invoice->sold_total = $request->sold_due_total;
        }
        if ($request->is_edit && ($request->is_final == 1)) {
            $invoice->is_final = 1;
        }
        $invoice->save();
        return $invoice;
    }

    public function store(Request $request)
    {
        $rule = [
            'customer_id' => 'required'
        ];
        $valid = Validator::make($request->all(), $rule);
        if ($valid->fails()) {
            return ['status' => false];
        }
        try {
            if ($request->ajax()) {
                $invoice = $this->saveInvoice($request);
                return ['status' =>  true, 'id' => $invoice->id];
            }
        } catch (Exception $exception) {
            // dd($exception);
            log::debug($exception);
        }
        return ['status' => false];
    }

    /**
     * inset/update invoice and invoice details
     *
     */
    public function storeDetails(Request $request)
    {
        try {
            if ($request->ajax()) {
                $rule = [
                    'customer_id' => 'required',
                    'gia_type' => 'required',
                    'invoice_id' => 'required'
                ];
                $valid = Validator::make($request->all(), $rule);
                if ($valid->fails()) {
                    return ['status' => false, 'validation' => false];
                }
                DB::transaction(function () use ($request) {
                    $this->saveInvoice($request);
                    $recordCount = count($request->gia_type);
                    // if ($recordCount && $request->is_edit) {
                    //     $obj = $this->InvoiceMemoDetail->whereInvoiceMemoId($request->invoice_id)->get();
                    //     if ($obj) {
                    //         foreach ($obj as $value) {
                    //             if ($value->file) {
                    //                 $this->removeFile('documents/'. $value->file);
                    //             }
                    //         }
                    //     }
                    //     $obj->each->delete();
                    // }
                    // $existIdArr = [];
                    if ($recordCount && $request->is_edit) {
                        $obj = $this->InvoiceMemoDetail->whereInvoiceMemoId($request->invoice_id)
                            ->whereNotIn('id', $request->inv_details_id ?? [])
                            ->get();
                        if ($obj) {
                            foreach ($obj as $value) {
                                if ($value->file) {
                                    $this->removeFile('documents/'. $value->file);
                                }
                            }
                            $obj->each->delete();
                        }
                    }
                    for ($i = 0; $i < $recordCount; $i++) {
                        $file = null;
                        // if (isset($request->inv_details_id[$i])) {
                        //     $invoicedetail = $this->InvoiceMemoDetail->whereId($request->inv_details_id[$i])->first();
                        // }
                        $invoicedetail = $this->InvoiceMemoDetail->whereInvoiceMemoId($request->invoice_id)
                            ->whereIsGia($request->gia_type[$i])
                            ->whereGiaId($request->gia_id[$i])
                            ->first();

                        if (!$invoicedetail) {
                            $invoicedetail = new $this->InvoiceMemoDetail;
                        } else {
                            // array_push($existIdArr, $invoicedetail->id);
                            if (isset($request->gia_file[$i])) {
                                if ($invoicedetail->file) {
                                    $this->removeFile('documents/'. $invoicedetail->file);
                                }
                            } else {
                                $invoicedetail->file = $invoicedetail->file;
                            }
                        }
                        if (isset($request->gia_file[$i])) {
                            $file = $this->getRandomString().'.' .$request->gia_file[$i]->getClientOriginalExtension();
                            $request->gia_file[$i]->move(public_path('documents'), $file);
                            $invoicedetail->file = $file;
                        }
                        $invoicedetail->invoice_memo_id = $request->invoice_id;
                        $invoicedetail->branch = $request->branch[$i];
                        $invoicedetail->is_gia = $request->gia_type[$i];
                        $invoicedetail->gia_id = $request->gia_id[$i];
                        $invoicedetail->details = $request->gia_details[$i];
                        $invoicedetail->remark = $request->remark[$i];
                        $invoicedetail->pcs = $request->pcs[$i];
                        $invoicedetail->carat = $request->carat[$i];
                        $invoicedetail->unit_price = $request->unit_price[$i];
                        $invoicedetail->amount = $request->final_amt[$i];
                        $invoicedetail->return_carat = $request->return_carat[$i];
                        $invoicedetail->sold_carat = $request->sold_carat[$i];
                        $invoicedetail->sold_amount = $request->sold_final_amt[$i];
                        $invoicedetail->save();
                    }
                    if ($request->is_edit && ($request->is_final == 1)) {
                        // $invoice->is_final = 1;
                        $this->saveFinalInvoice($request, Auth::user()->id);
                        $this->updateNoGiaCarat($request);
                    }
                });
                Session::flash('msg', 'Memo invoice has been updated!');
                return ['status' =>  true];
            }
        } catch (Exception $exception) {
            log::debug($exception);
            // abort(500);
            Session::flash('msg', 'Oops, Please try again!');
        }
        return ['status' => false];
    }

    public function getCurrentNoGiaStock($giaId, $memoDetailsId = null)
    {
        $invoiceNotFinalIds = $this->InvoiceMemo->where('is_final', '!=', 1)->get()->pluck('id');
        $sumOfEc = $this->InvoiceMemoDetail->query();
        $sumOfEc->whereIsGia(2)->whereGiaId($giaId)->whereIn('Invoice_memo_id', $invoiceNotFinalIds);
        if ($memoDetailsId) {
            $sumOfEc->where('id', '!=', $memoDetailsId);
        }
        $sumOfEntryCarat = $sumOfEc->sum('carat');
        $noGiaAvailStock = $this->Nogia->whereId($giaId)->first('carat')->carat ?? 0;
        $currentStock = $this->formatNumber(
            $this->formatNumber($noGiaAvailStock) - $this->formatNumber($sumOfEntryCarat)
        );
        if ($currentStock == 0) {
            $currentStock = 0;
        } else if($currentStock < 0) {
            $currentStock = -1;
        }
        return $currentStock;
    }

    public function edit($id, Request $request)
    {
        if ($request->ajax()) {
            $invoiceId = $id;
        } else {
            $invoiceId = decrypt($id);
        }
        $customers = $this->Customer->get()->pluck('name', 'id');
        $country = $this->Country->get()->pluck('name', 'id');
        $invoice = $this->InvoiceMemo->where('id', $invoiceId)->first();
        $invoiceDetails = $this->InvoiceMemoDetail->whereInvoiceMemoId($invoiceId)->get();
        if ($request->ajax()) {
            $data = [];
            $data['invoice'] = $invoice;
            return $data;
        }
        return view('admin.memo.edit', compact(['invoice', 'customers', 'invoice', 'country', 'invoiceDetails']));
    }

    public function destroy(Request $request, $id)
    {
        try {
            if ($id > 0) {
                $memo = $this->InvoiceMemo->find($id);
                // $memo->delete();
                $memo->memoDetails->each(function ($item) {
                    // Storage::delete($item->file);
                    $this->removeFile('documents/'. $item->file);
                    $item->delete();
                });
                $memo->delete();
                return 'true';
            }
            return 'false';
        } catch (Exception $exception) {
            return 'false';
        }
    }

    public function destroyInvoiceDetails($id)
    {
        try {
            if ($id > 0) {
                $invoiceDetailsObj = $this->InvoiceMemoDetail->whereId($id)->first();
                if ($invoiceDetailsObj) {
                    $this->removeFile('documents/'. $invoiceDetailsObj->file);
                    $invoiceDetailsObj->delete();
                }
                return ['status' => true];
            }
            return ['status' => false];
        } catch (Exception $exception) {
            return ['status' => false];
        }
    }


    private function getCurrency($countryId)
    {
        $currancy = [1 => 'USD', 2 => 'INR', 3 => 'RMB'];
        if (array_key_exists($countryId, $currancy)) {
            return $currancy[$countryId];
        }
        return null;
    }

    /**
     * Add entry in sell invoice of sold carat value from invoice mwmo to invoice table
     */
    private function saveFinalInvoice(Request $request, $authUseId)
    {
        //Find next auto increment id
        $statement = DB::select("SHOW TABLE STATUS LIKE 'invoice'");
        //Display prefix 0 for complete 8 digit code
        $nextId = str_pad($statement[0]->Auto_increment, 8, '0', STR_PAD_LEFT);

        $invoice = $this->Invoice;
        $invoice->create_by = $authUseId;
        $invoice->l_invoice = $nextId;
        $invoice->e_invoice = $nextId;
        $invoice->customer_id = $request->customer_id;
        $invoice->reference = $request->reference;
        $invoice->unit_price = $request->single_unit_price;
        $invoice->rate = $request->rate;
        $invoice->country_id = $request->country;
        $invoice->is_broker = $request->is_broker;
        $invoice->percentage = $request->percentage;
        $invoice->date = Carbon::parse($request->date)->format('Y-m-d');
        $invoice->term = $request->term;
        $invoice->duedate = Carbon::parse($request->duedate)->format('Y-m-d');
        $invoice->inv_type = 3;
        $invoice->payment_in = $this->getCurrency($request->country);
        $invoice->carat_total = $request->sold_carat_total;
        $invoice->total = $request->sold_due_total;
        $invoice->memo_id = $request->invoice_id;
        $invoice->save();

        $recordCount = count($request->gia_type);
        for ($i = 0; $i < $recordCount; $i++) {
            $invoicedetail = new $this->Invoicedetail;
            $invoicedetail->invoice_id = $invoice->id;
            $invoicedetail->branch = $request->branch[$i];
            $invoicedetail->is_gia = $request->gia_type[$i];
            $invoicedetail->gia_id = $request->gia_id[$i];
            $invoicedetail->details = $request->gia_details[$i];
            $invoicedetail->pcs = $request->pcs[$i];
            $invoicedetail->carat = $request->sold_carat[$i];
            $invoicedetail->unit_price = $request->unit_price[$i];
            $invoicedetail->amount = $request->sold_final_amt[$i];
            $invoicedetail->save();
        }

    }

    private function updateNoGiaCarat(Request $request)
    {
        $recordCount = count($request->gia_type);
        for ($i = 0; $i < $recordCount; $i++) {
            if ($request->gia_type[$i] == 2) {
                $noGiaObj = $this->Nogia->whereId($request->gia_id[$i])->first();
                $noGiaObj->carat = $this->formatNumber($noGiaObj->carat) -  $this->formatNumber($request->sold_carat[$i]);
                $noGiaObj->save();
            }
        }
    }

    private function formatNumber($number)
    {
        return number_format((float)$number, 2, '.', '');
    }
}
