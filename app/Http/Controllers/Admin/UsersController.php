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
use App\Models\Users;
use Input;

class UsersController extends AdminController
{
    public function index(Request $request) {
        
        $users = $this->Users->with('country:id,name as country_name')->orderBy('id','DESC')->get();
        return view('admin.systemuser.index',compact('users'));
    }
    public function add() {
        $country = $this->Country->get()->pluck('name', 'id');
        return view('admin.systemuser.create',compact('country'));
    }
    public function store(Request $request){
       
        $rule = [
            'email' => 'required|email|min:2|max:50|unique:users,email',
            'name' => 'required',
            'password' => 'required',
            
        ]; 
        $valid = Validator::make($request->all(),$rule);

        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }
        try{    
        $users = $this->Users;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->country_id = $request->country;
        $users->password = Hash::make($request->password);
        $users->save();
        Session::flash('msg', 'users has been added!');
        return redirect('/users');
    } catch (Exception $exception) {
        dd($exception);
        log::debug($exception);
        abort(500);
    }
  }
    public function destroy(Request $request, $id) {
        try{
            if($id>0) {
                $users = $this->Users->find($id);
                $users->delete();
                if($request->ajax()) {
                    return ['status'=>'true'];
                }
            }
        }catch(Exception $e) {

        }
    }
    public function edit($id,Request $request) {
        $country = $this->Country->get()->pluck('name', 'id');
        if($request->ajax()){
            $usersId = $id;
        }
        else {
            $usersId = decrypt($id);
        }
        $users = Users::where('id',$usersId)->first();

        if($request->ajax()){
            $data = [];
            $data['users'] = $users;
            return $data;
        }
        return view('admin.systemuser.edit',compact('users','country'));
    }  
    public function update(Request $request,$id){
        
        try {
            $id = decrypt($id);
        } catch (Exception $exception) {
            Session::flash('msg', 'Oops, Please try again!');
            return redirect('/users');
        }
        try{
            $users = Users::whereId($id)->first();
            $users->name = $request->name;
            $users->email = $request->email;
            if(!empty($request->password)) {
                $users->password = Hash::make($request->password);
            }
            $users->country_id = $request->country;
            $users->save();
            Session::flash('msg', 'users has been updated!');
            return redirect('/users');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
         
        }
    }
}
