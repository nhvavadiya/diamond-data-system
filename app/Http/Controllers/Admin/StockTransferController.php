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
use Exception;
use DB;
use DataTables;
use Auth;

class StockTransferController extends AdminController
{
    public function index(Request $request) {
        if ($request->ajax()) {
            
            $gia = $this->Gia
                ->orderBy('id','DESC');
            $search = $request->search;
            if($search){
                $gia = $gia->where(function($query) use($search){
                    $query->where('shape','LIKE','%'.$search.'%')
                        ->orWhere('clarity','LIKE','%'.$search.'%')
                        ->orWhere('fancy_color','LIKE','%'.$search.'%')
                        ->orWhere('fancy_color_intensity','LIKE','%'.$search.'%')
                        ->orWhere('fancy_color_overtone','LIKE','%'.$search.'%');
                        
                    
                    });
            }
            $gia = $gia->paginate(100);

            return response()->json([
                View::make('admin.stock_transfer.data',compact('gia'))->render()
            ]);
        }
        $country = $this->Country->pluck('name', 'id');

        return view('admin.stock_transfer.index',compact('country'));
    }
    public function add(Request $request)
    {
        $rule = ['stock' => 'required','send_to' => 'required'];
        $valid = Validator::make($request->all(), $rule);
        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }
        try {
                //for get Gia Country
                $gia = $this->Gia
                ->whereId($request->gia_id)
                ->first();
                //add
                $stock_transfer = $this->StockTransfer;
                $stock_transfer->gia_id = $request->gia_id;
                $stock_transfer->stock = $request->stock;
                $stock_transfer->send_from = $gia->country;
                $stock_transfer->send_to = $request->send_to;
                $stock_transfer->created_by = Auth::user()->id;
                $stock_transfer->status = 0;
                $stock_transfer->save();
            Session::flash('msg', 'Stock Transfer rquest has been added!');
            return redirect('/stock-transfer');
        } catch (Exception $exception) {
            dd($exception);
            log::debug($exception);
            abort(500);
        }
    }
    public function view(Request $request)
    {
        if ($request->ajax()) {
            
            $stock_transfer = $this->StockTransfer
            ->Join('country','stock_transfer.send_to', '=', 'country.id')
            ->select('stock_transfer.*','country.name as country_name')
            ->orderBy('id','DESC');
            $search = $request->search;
            if($search){
                $stock_transfer = $stock_transfer->where(function($query) use($search){
                    $query->where('send_from','LIKE','%'.$search.'%')
                        ->orWhere('send_to','LIKE','%'.$search.'%')
                        ->orWhere('stock','LIKE','%'.$search.'%');
                    });
            }
            $stock_transfer = $stock_transfer->paginate(100);

            return response()->json([
                View::make('admin.stock_transfer.requestdata',compact('stock_transfer'))->render()
            ]);
        }
        return view('admin.stock_transfer.stockrequest');
    }
    public function destroy(Request $request, $id)
    {
        try{
            if($id>0) {
                $stock_transfer = $this->StockTransfer->find($id);
                $stock_transfer->delete();
                return 'true';
            }
            return 'false';
        }catch(Exception $exception){
            return 'false';
        }
    }
}
