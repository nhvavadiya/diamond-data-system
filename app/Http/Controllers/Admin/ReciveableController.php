<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;
use Exception;
use Validator;
use View;
use Auth;
use Log;
use DB;
use DataTables;


class ReciveableController extends AdminController
{
    public function index(Request $request){
        if($request->ajax()){
            $reciveable = $this->Reciveable
                ->where('type', 1)
                ->orderBy('id', 'DESC');
                $search = $request->search;
                    if($search){
                        $reciveable = $reciveable->where(function($query) use($search){
                            $query->where('invoice_id','LIKE','%'.$search.'%')
                                ->orWhere('note','LIKE','%'.$search.'%');
                            
                                
                            
                            });
                    }
                    $reciveable = $reciveable->paginate(100);
            return response()->json([
                View::make('admin.reciveable.data',compact('reciveable'))->render()
            ]);
        }
        return view('admin.reciveable.index');
    }
    public function add() {
        return view('admin.reciveable.create');
    }

    public function store(Request $request){
      
            $rule = [
                'date' => 'required',
                'note' => 'required',
               
            ];
           
            $valid = Validator::make($request->all(),$rule);

            if($valid->fails()){
                return redirect()->back()
                    ->withErrors($valid->errors())
                    ->withInput();
            }
            try {
            $reciveable = $this->Reciveable;
            $reciveable->date = Carbon::parse($request->date)->format('Y-m-d');
            $reciveable->invoice_id = $request->invoice_id;
            $reciveable->note = $request->note;
            $reciveable->type = $request->type;
            $reciveable->created_by = \Auth()->user()->id;
            $reciveable->save();
            Session::flash('msg', 'reciveable has been added!');
            return redirect('/reciveable');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }           
    
    }
    public function edit(Request $request) {
         
        $id = decrypt($request->reciveableId);
        try {
            if($id>0) {
                $reciveableData = $this->Reciveable
                                    ->whereId($id)
                                    ->first();
                return ['reciveableData'=>$reciveableData];
            }
        } catch (Exception $exception) {
            return redirect('/reciveable');
        }
            try {
                $reciveable = $this->Reciveable
                    ->whereId($reciveableId)
                    ->first();
     

            return view('admin.reciveable.edit', compact('reciveable'));
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
        return view('admin.reciveable.edit');
    }
    
    public function update(Request $request) {
        try {
            $reciveableId  = decrypt($request->reciveable_id);
        } catch (Exception $exception) {
            Session::flash('msg', 'Oops, Please try again!');
            return redirect('/reciveable');
        }

        $rule = [
                'date' => 'required',
                'amount' => 'required'
        ];


        $valid = Validator::make($request->all(), $rule);

        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }

        try {
            $reciveable = $this->Reciveable
                ->whereId($reciveableId)
                ->first();

                $reciveable->date = Carbon::parse($request->date)->format('Y-m-d');
                $reciveable->invoice_id = $request->invoice_id;
                $reciveable->note = $request->note;
                $reciveable->created_by = \Auth()->user()->id;
                $reciveable->save();
            Session::flash('msg', 'reciveable has been updated!');
            return redirect('/reciveable');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }
     public function destroy(Request $request, $id) {
        try{
            if($id>0) {
                $reciveable = $this->Reciveable->find($id);
                $reciveable->delete();
                return 'true';
            }
            return 'false';
        }catch(Exception $exception){
            return 'false';
        }
    }






}
