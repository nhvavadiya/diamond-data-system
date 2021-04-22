<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;
use Validator;
use View;
use Log;
use DB;
use Exception;
use DataTables;

class InvoicedetailController extends AdminController
{
    public function store(Request $request){
     
       
            try {
            $invoicedetail = $this->no;
            $invoicedetail->no = $request->branch;
            $invoicedetail->is_gia = $request->is_gia ;
            $invoicedetail->details = $request->details;
            $invoicedetail->pcs = $request->pcs;
            $invoicedetail->carat = $request->carat;
            $invoicedetail->unit_price = $request->unit_price;
            $invoicedetail->amount = $request->amount;
            $invoicedetail->save();


            Session::flash('msg', 'invoice has been added!');
            return redirect('/invoice');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }

}
