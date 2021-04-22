<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Session;
use Hash;
use Validator;
use View;
use Log;
use Exception;
use Carbon\Carbon;
use DB;
use DataTables;
use App\Models\Branch;
use Input;

class BranchController extends AdminController
{
    public function index(Request $request) {
        
        $branch = $this->Branch->orderBy('id','DESC')->get();
        return view('admin.branch.index',compact('branch'));
    }
    public function destroy(Request $request, $id) {
        try{
            if($id>0) {
                $branch = $this->Branch->find($id);
                $branch->delete();
                if($request->ajax()) {
                    return ['status'=>'true'];
                }
            }
        }catch(Exception $e) {

        }
    }
    public function edit($id,Request $request) {
    
        if($request->ajax()){
            $branchId = $id;
        }
        else {
            $branchId = decrypt($id);
        }
        $branch = Branch::where('id',$branchId)->first();

        if($request->ajax()){
            $data = [];
            $data['branch'] = $branch;
            return $data;
        }
        return view('admin.branch.edit',compact('branch'));
    } 
    public function update(Request $request,$id){
        
        try {
            $id = decrypt($id);
        } catch (Exception $exception) {
            Session::flash('msg', 'Oops, Please try again!');
            return redirect('/branch');
        }
        try{
            $branch = Branch::whereId($id)->first();
            $branch->name = $request->name;
            $branch->save();
            Session::flash('msg', 'branch has been updated!');
            return redirect('/branch');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
         
        }
    }
    public function add() {
     
        return view('admin.branch.create');
    }
    public function store(Request $request){
      
        $rule = [
            'name' => 'required',   
        ]; 
        $valid = Validator::make($request->all(),$rule);

        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }
        try{    
        $branch = $this->Branch;
        $branch->name = $request->name;
        $branch->save();
        Session::flash('msg', 'branch has been added!');
        return redirect('/branch');
    } catch (Exception $exception) {
        dd($exception);
        log::debug($exception);
        abort(500);
    }
  }
}
