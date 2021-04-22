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

class NogiaController extends AdminController
{

    public function index(Request $request) {
        if ($request->ajax()) {
            
            $nogia = $this->Nogia
                ->orderBy('id','DESC');
           //    $fromdate = $request->fromdate;
           //    $todate = $request->todate;
           //    if ($fromdate || $todate) {
           //        $customer = $customer->whereBetween('created_at', [$fromdate, $todate]);
           //    }
                $search = $request->search;
                if($search){
                    $nogia = $nogia->where(function($query) use($search){
                        $query->where('details','LIKE','%'.$search.'%')
                            ->orWhere('pc','LIKE','%'.$search.'%');
              
                            
                        
                        });
                }
                $nogia = $nogia->paginate(100);

          
                return response()->json([
                    View::make('admin.nogia.data',compact('nogia'))->render()
                ]);
        }
        $branches = $this->Branch->get()->pluck('name', 'id');
        return view('admin.nogia.index', compact('branches'));
    }
    public function store(Request $request) {
        $rule = [
            'details' => 'required',
            
          ];
    

        $valid = Validator::make($request->all(), $rule);

        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }

        try {
            $nogia = $this->Nogia;
                $nogia->details = $request->details;
                $nogia->pc = $request->pc;
                $nogia->carat = $request->carat;
                $nogia->price = $request->price;
                $nogia->total = $request->total;
                $nogia->branch_id = $request->branch_id;
                $nogia->save();
            Session::flash('msg', 'nogia has been added!');
            return redirect('/nogia');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }
    public function destroy(Request $request, $id) {
        try{
            if($id>0) {
                $nogia = $this->Nogia->find($id);
                $nogia->delete();
                return 'true';
            }
            return 'false';
        }catch(Exception $exception){
            return 'false';
        }
    }
    public function edit(Request $request) {
         
        $id = decrypt($request->nogiaId);
        try {
            if($id>0) {
                $nogiaData = $this->Nogia
                                    ->whereId($id)
                                    ->first();
                return ['nogiaData'=>$nogiaData];
            }
        } catch (Exception $exception) {
            return redirect('/nogia');
        }   
            try {
                $nogia = $this->Nogia
                    ->whereId($nogiaId)
                    ->first();
     
                return view('admin.nogia.edit', compact('nogia'));
            } catch (Exception $exception) {
                log::debug($exception);
                abort(500);
            }
            return view('admin.nogia.edit');
        }
        public function update(Request $request) {
            try {
                $nogiaId = decrypt($request->nogia_id);
            } catch (Exception $exception) {
                Session::flash('msg', 'Oops, Please try again!');
                return redirect('/nogia');
            }
    
          $rule = [
            'details' => 'required',
            
          ];
    
    
          $valid = Validator::make($request->all(), $rule);
    
          if($valid->fails()){
              return redirect()->back()
                  ->withErrors($valid->errors())
                  ->withInput();
          }
    
            try {
                $nogia = $this->Nogia
                    ->whereId($nogiaId)
                    ->first();
    
                $nogia->details = $request->details;
                $nogia->pc = $request->pc;
                $nogia->carat = $request->carat;
                $nogia->price = $request->price;
                $nogia->total = $request->total;
                $nogia->save();
                Session::flash('msg', 'nogia has been updated!');
                return redirect('/nogia');
            } catch (Exception $exception) {
                log::debug($exception);
                abort(500);
            }
        }
      

}
