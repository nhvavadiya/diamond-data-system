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
use PDF;

class InvoiceController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $invoice = $this->Invoice->with('country:id,name as country_name')
                ->leftJoin('customers', 'invoice.customer_id', '=', 'customers.id')
                ->select('invoice.*', 'customers.name AS customer_name')
                ->orderBy('id', 'DESC');
            $search = $request->search;
            if ($search) {
                $invoice = $invoice->where(function ($query) use ($search) {
                    $query->where('l_invoice', 'LIKE', '%' . $search . '%')
                        ->orWhere('e_invoice', 'LIKE', '%' . $search . '%');
                });
            }
            $invoice = $invoice->paginate(100);
            return response()->json([
                View::make('admin.invoices.data', compact('invoice'))->render()
            ]);
        }
        return view('admin.invoices.index');
    }

    public function add()
    {
        $statement = DB::select("SHOW TABLE STATUS LIKE 'invoice'");
        //Display prefix 0 for complete 8 digit code
        $nextId = str_pad($statement[0]->Auto_increment, 8, '0', STR_PAD_LEFT);
        $customers = $this->Customer->pluck('name', 'id');
        $country = $this->Country->pluck('name', 'id');
        $branch = $this->Branch->pluck('name','id');
        // dd($customers);
        return view('admin.invoices.create', compact(['nextId', 'customers', 'country','branch']));
    }

    public function getbranch() {
        try{
            $branch = $this->Branch->get();

            return[
                'status'=>'true',
                'branch'=>$branch
            ];
        }catch(Exception $e) {

        }
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
            $invoice = $this->Invoice->whereId($request->invoice_id)->first();
        } else {
            $invoice = $this->Invoice;
            $invoice->create_by = Auth::user()->id;
        }
        $invoice->l_invoice = $request->l_invoice;
        $invoice->e_invoice = $request->e_invoice;
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
        $invoice->inv_type = $request->inv_type;
        $invoice->payment_in = $this->getCurrency($request->country);
        $invoice->carat_total = $request->carat_total;
        $invoice->total = $request->due_total;
        // dd($invoice);
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
            // return redirect()->back()
            //     ->withErrors($valid->errors())
            //     ->withInput();
        }
        try {
            if ($request->ajax()) {
                $invoice = $this->saveInvoice($request);
                return ['status' =>  true, 'id' => $invoice->id];
            }
        } catch (Exception $exception) {
            // dd($exception);
            log::debug($exception);
            // abort(500);
        }
        return ['status' => false];
    }

    private function saveInvoiceAndDetails(Request $request)
    {
        // dd($request->all());
        DB::transaction(function () use ($request) {
            $this->saveInvoice($request);
            $recordCount = count($request->gia_type);
            if ($recordCount && $request->is_edit) {
                $this->Invoicedetail->whereInvoiceId($request->invoice_id)->delete();
            }
            for ($i = 0; $i < $recordCount; $i++) {
                $invoicedetail = new $this->Invoicedetail;
                // $invoicedetail= $invoicedetailObj->whereId($request->invoice_detail_id)->first();
                $invoicedetail->invoice_id = $request->invoice_id;
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

            // dd($invoicedetail);
        });
    }

    /**
     * inset/update invoice and invoice details
     *
     */
    public function storeDetails(Request $request)
    {
        try {

            // dd($request->all());
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

                // dd($valid);
                if ($valid->fails()) {
                    return ['status' => false, 'validation' => false];
                }
                $this->saveInvoiceAndDetails($request);
                Session::flash('msg', 'Invoice has been updated!');
                $response = ($request->invoice_id) ? ['status' =>  true, 'id' => $request->invoice_id] : ['status' =>  true];
                return $response;
            }
        } catch (Exception $exception) {

            dd($exception);
            log::debug($exception);
            // abort(500);
            Session::flash('msg', 'Oops, Please try again!');
        }
        return ['status' => false];
    }

    public function printInvoice($id)
    {
        $invoiceObj = $this->Invoice->with(['invoiceDetails', 'country', 'customer:id,email,name,surname'])
            ->whereId($id)
            ->first();
        $invoice = ["invoice" => $invoiceObj];
        $pdf = PDF::loadView('admin.pdf.invoice', $invoice);
        $filename = "invoice-" . date("ymdhis");
        return $pdf->download($filename.'.pdf');
        // return $pdf->stream('admin123.pdf',array('Attachment'=>0));
    }

    // public function storeDetailsAndPrint(Request $request)
    // {
    //     try {
    //         dd($request->all());
           
    //         $rule = [
    //             'l_invoice' => 'required',
    //             'e_invoice' => 'required',
    //             'customer_id' => 'required',
    //             'is_broker' => 'required',
    //             'gia_type' => 'required',
    //             'invoice_id' => 'required'
    //         ];
    //         $valid = Validator::make($request->all(), $rule);
    //         if ($valid->fails()) {
    //             dd($valid->errors());
    //             return redirect()->back()
    //             ->withErrors($valid->errors())
    //             ->withInput();
    //             // return ['status' => false, 'validation' => false];
    //         }
    //         $this->saveInvoiceAndDetails($request);
            
    //         // $invoice = $this->Invoice->whereId($request->invoice_id)->first();
    //         Session::flash('msg', 'Invoice has been updated!');
    //         $pdf = PDF::loadView('admin.pdf.invoice', []);
    //         return $pdf->download('admin123.pdf');
    //     } catch (Exception $exception) {
    //         log::debug($exception);
    //         // abort(500);
    //         Session::flash('msg', 'Oops, Please try again!');
    //     }
    // }

    public function edit($id, Request $request)
    {

        if ($request->ajax()) {
            $invoiceId = $id;
        } else {
            $invoiceId = decrypt($id);
        }
        $customers = $this->Customer->get()->pluck('name', 'id');
        $country = $this->Country->get()->pluck('name', 'id');
        $invoice = $this->Invoice->where('id', $invoiceId)->first();
        $invoiceDetails = $this->Invoicedetail->whereInvoiceId($invoiceId)->get();
        if ($request->ajax()) {
            $data = [];
            $data['invoice'] = $invoice;
            return $data;
        }
        return view('admin.invoices.edit', compact(['invoice', 'customers', 'invoice', 'country', 'invoiceDetails']));
    }

    public function destroy($id)
    {
        try {
            if ($id > 0) {
                DB::transaction(function () use ($id) {
                    $this->Invoicedetail->whereInvoiceId($id)->delete();
                    $invoice = $this->Invoice->find($id);
                    $invoice->delete();
                });
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
        return null;
    }
}
