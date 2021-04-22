<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Exception;
use Validator;
use Session;
use View;
use Auth;
use Log;
use DB;
use DataTables;

class PaybleController extends AdminController
{
        public function index(Request $request){
            if($request->ajax()){
                $payble = $this->Payble
               
                    ->where('type', 2)
                    ->orderBy('id', 'DESC');
                    $search = $request->search;
                    if($search){
                        $payble = $payble->where(function($query) use($search){
                            $query->where('invoice_id','LIKE','%'.$search.'%')
                                ->orWhere('note','LIKE','%'.$search.'%');
                            
                                
                            
                            });
                    }
                    $payble = $payble->paginate(100);
                return response()->json([
                    View::make('admin.payble.data',compact('payble'))->render()
                ]);
            }
            return view('admin.payble.index');
        }
        public function add() {
            return view('admin.payble.create');
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
                try{
                 $payble = $this->Payble;
                $payble->date = Carbon::parse($request->date)->format('Y-m-d');
                $payble->invoice_id = $request->invoice_id;
                $payble->note = $request->note;
                $payble->type = $request->type;
                $payble->created_by = \Auth()->user()->id;
                $payble->save();
                Session::flash('msg', 'payble has been added!');
                return redirect('/payble');
            } catch (Exception $exception) {
                log::debug($exception);
                abort(500);
            }
    
        }
        public function edit(Request $request) {

            $id = decrypt($request->paybleId);
            try {
                if($id>0) {
                    $paybleData = $this->Payble
                                        ->whereId($id)
                                        ->first();
                    return ['paybleData'=>$paybleData];
                }
            } catch (Exception $exception) {
                return redirect('/payble');
            }
    
            try {
                $payble = $this->Payble
                    ->whereId($paybleId)
                    ->first();
    
                return view('admin.payble.edit', compact('payble'));
            } catch (Exception $exception) {
                log::debug($exception);
                abort(500);
            }
            return view('admin.payble.edit');
        }
        
    
        public function update(Request $request) {
            try {
                $paybleId = decrypt($request->payble_id);
            } catch (Exception $exception) {
                Session::flash('msg', 'Oops, Please try again!');
                return redirect('/payble');
            }
    
            $rule = [
                'date' => 'required',
                'note' => 'required',
            ];
    
            $valid = Validator::make($request->all(), $rule);
    
            if($valid->fails()){
                return redirect()->back()
                    ->withErrors($valid->errors())
                    ->withInput();
            }
    
            try {
                $payble = $this->Payble
                    ->whereId($paybleId)
                    ->first();
    
                    $payble->date = Carbon::parse($request->date)->format('Y-m-d');
                    $payble->invoice_id = $request->invoice_id;
                    $payble->note = $request->note;
                    $payble->created_by = \Auth()->user()->id;
                    $payble->save();
        
                Session::flash('msg', 'payble has been updated!');
                return redirect('/payble');
            } catch (Exception $exception) {
                log::debug($exception);
                abort(500);
            }
        }
    
        public function destroy(Request $request, $id) {
            try{
                if($id>0) {
                    $payble = $this->Payble->find($id);
                    $payble->delete();
                    return 'true';
                }
                return 'false';
            }catch(Exception $exception){
                return 'false';
            }
        }
        public function category(Request $request) {
            return view('admin.payble.category.index');
        }
    }


 