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

class PurchasController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $purchas = $this->InvoicePurchase->with('saler:id,name as seller_name')->orderBy('id', 'DESC');
            $search = $request->search;
            if ($search) {
                $purchas = $purchas->where(function ($query) use ($search) {
                    $query->where('l_invoice', 'LIKE', '%' . $search . '%')
                        ->orWhere('e_invoice', 'LIKE', '%' . $search . '%');
                });
            }
            $purchas = $purchas->paginate(100);
            return response()->json([
                View::make('admin.purchas.data', compact('purchas'))->render()
            ]);
        }
        return view('admin.purchas.index');
    }

    public function add()
    {
        $statement = DB::select("SHOW TABLE STATUS LIKE 'invoice_purchase'");
        //Display prefix 0 for complete 8 digit code
        $nextId = str_pad($statement[0]->Auto_increment, 8, '0', STR_PAD_LEFT);
        $sellers = $this->Saler->get()->pluck('full_name', 'id');
        $country = $this->Country->get()->pluck('name', 'id');
        return view('admin.purchas.create', compact(['nextId', 'sellers', 'country']));
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

    public function saveInvoice(Request $request)
    {
        if ($request->invoice_id) {
            $invoice = $this->InvoicePurchase->whereId($request->invoice_id)->first();
        } else {
            $invoice = $this->InvoicePurchase;
            $invoice->create_by = Auth::user()->id;
        }
        $invoice->l_invoice = $request->l_invoice;
        $invoice->e_invoice = $request->e_invoice;
        $invoice->seller_id = $request->customer_id;
        $invoice->reference = $request->reference;
        $invoice->unit_price = $request->single_unit_price;
        $invoice->rate = $request->rate;
        $invoice->country_id = $request->country;
        $invoice->is_broker = $request->is_broker;
        $invoice->percentage = $request->percentage;
        $invoice->date = Carbon::parse($request->date)->format('Y-m-d');
        $invoice->term = $request->term;
        $invoice->duedate = Carbon::parse($request->duedate)->format('Y-m-d');
        $invoice->payment_in = $this->getCurrency($request->country) ?? null;
        $invoice->carat_total = $request->carat_total;
        $invoice->total = $request->due_total;
        $invoice->save();
        return $invoice;
    }

    public function store(Request $request)
    {
        $rule = [
            'l_invoice' => 'required',
            'e_invoice' => 'required',
            'customer_id' => 'required',
            'is_broker' => 'required',
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
                    'l_invoice' => 'required',
                    'e_invoice' => 'required',
                    'customer_id' => 'required',
                    'is_broker' => 'required',
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
                    if ($recordCount && $request->is_edit) {
                        $this->InvoicePurchaseDetail->whereInvoicePurchaseId($request->invoice_id)->delete();
                    }
                    for ($i = 0; $i < $recordCount; $i++) {
                        $invoicedetail = new $this->InvoicePurchaseDetail;
                        // $invoicedetail= $invoicedetailObj->whereId($request->invoice_detail_id)->first();
                        $invoicedetail->invoice_purchase_id = $request->invoice_id;
                        $invoicedetail->branch = $request->branch[$i];
                        $invoicedetail->is_gia = $request->gia_type[$i];
                        $invoicedetail->gia_id = $request->gia_id[$i];
                        $invoicedetail->details = $request->gia_details[$i];
                        $invoicedetail->pcs = $request->pcs[$i];
                        $invoicedetail->carat = $request->carat[$i];
                        $invoicedetail->unit_price = $request->unit_price[$i];
                        $invoicedetail->amount = $request->final_amt[$i];
                        $invoicedetail->save();
                    }
                });
                Session::flash('msg', 'Purchas invoice has been updated!');
                return ['status' =>  true];
            }
        } catch (Exception $exception) {
            log::debug($exception);
            Session::flash('msg', 'Oops, Please try again!');
        }
        return ['status' => false];
    }

    public function edit($id, Request $request)
    {

        if ($request->ajax()) {
            $invoiceId = $id;
        } else {
            $invoiceId = decrypt($id);
        }
        $sellers = $this->Saler->get()->pluck('full_name', 'id');
        $country = $this->Country->get()->pluck('name', 'id');
        $invoice = $this->InvoicePurchase->where('id', $invoiceId)->first();
        $invoiceDetails = $this->InvoicePurchaseDetail->whereInvoicePurchaseId($invoiceId)->get();
        if ($request->ajax()) {
            $data = [];
            $data['invoice'] = $invoice;
            return $data;
        }
        return view('admin.purchas.edit', compact(['invoice', 'sellers', 'invoice', 'country', 'invoiceDetails']));
    }

    public function destroy(Request $request, $id)
    {
        try {
            if ($id > 0) {
                $purchas = $this->InvoicePurchase->find($id);
                $purchas->delete();
                return 'true';
            }
            return 'false';
        } catch (Exception $exception) {
            return 'false';
        }
    }

    private function getCurrency($countryId)
    {
        $currancy = [1 => 'USD', 2 => 'INR', 3 => 'RMB'];
        if (array_key_exists($countryId, $currancy)) {
            return $currancy[$countryId];
        }
        return;
    }
}
