<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    // user can login
    public function login(Request $request){
        $rule = [
            'password' => 'required',
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(),$rule);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors());
        }

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=>1])){
            Session::flash('msg','Success');
            return redirect('/');
        }else{
            Session::flash('msg','These credentials do not match our records.');
            return back();
        }
    }


    // user can logout using this funtion
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
