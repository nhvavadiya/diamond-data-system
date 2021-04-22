<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Session;
use Validator;
use View;
use Log;
use Exception;
use Carbon\Carbon;
use DB;
use DataTables;

class SalerController extends AdminController
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $saler = $this->Saler->orderBy('id','DESC');

            //$fromdate = $request->fromdate;
           //$todate = $request->todate;
           //if ($fromdate || $todate) {
           //    $saler = $saler->whereBetween('created_at', [$fromdate, $todate]);
           //}

            $search = $request->search;
            if($search){
                $saler = $saler->where(function($query) use($search){
                    $query->where('email','LIKE','%'.$search.'%')
                        ->orWhere('surname','LIKE','%'.$search.'%')
                        ->orWhere('name','LIKE','%'.$search.'%')
                        ->orWhere('nick_name','LIKE','%'.$search.'%')
                        ->orWhere('mobile','LIKE','%'.$search.'%')
                        ->orWhere('position','LIKE','%'.$search.'%')
                        ->orWhere('branch','LIKE','%'.$search.'%')
                        ->orWhere('chat','LIKE','%'.$search.'%')
                        ->orWhere('skype','LIKE','%'.$search.'%');
                    });
            }
            $saler = $saler->paginate(100);
                return response()->json([
                    View::make('admin.salers.data',compact('saler'))->render()
                ]);
        }
        return view('admin.salers.index');
    }

    public function add() {
        return view('admin.salers.create');
    }

    public function store(Request $request) {
       
        $rule = [
            'email' => 'required|email|min:2|max:50|unique:salers,email',
            'surname' => 'required|alpha|min:2|max:50',
            'name' => 'required|alpha|min:2|max:50',
            'nick_name' => 'max:50',
            'gender' => 'required',
            'date_of_birth' => 'required|before:today',
            'position' => 'max:50',
            'branch' => 'max:50',
            'chat' => 'max:200',
            'skype' => 'max:200',
        ];

        $valid = Validator::make($request->all(), $rule);

        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }

        try {
            $saler = $this->Saler;
            $saler->email = $request->email;
            $saler->surname = $request->surname;
            $saler->name = $request->name;
            $saler->nick_name = $request->nick_name;
            $saler->gender = $request->gender;
            $saler->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
            $saler->position = $request->position;
            $saler->branch = $request->branch;
            $saler->mobile = $request->mobile;
            $saler->chat = $request->chat;
            $saler->skype = $request->skype;
            $saler->save();
            Session::flash('msg', 'Saler has been added!');
            return redirect('/saler');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
            
        }
    }

    public function edit(Request $request) {

        $id = decrypt($request->salerId);
        try {
            if($id>0) {
                $salerData = $this->Saler
                                    ->whereId($id)
                                    ->first();
                return ['salerData'=>$salerData];
            }
        } catch (Exception $exception) {
            return redirect('/saler');
        }

        try {
            $saler = $this->Saler
                ->whereId($salerId)
                ->first();

            return view('admin.salers.edit', compact('saler'));
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
        return view('admin.salers.edit');
    }

    public function update(Request $request) {
        try {
            $salerId = decrypt($request->saler_id);
        } catch (Exception $exception) {
            Session::flash('msg', 'Oops, Please try again!');
            return redirect('/saler');
        }

        $rule = [
            'email' => 'required|email|min:2|max:50|unique:salers,email,' . $salerId,
            'name' => 'required|alpha|min:2|max:50',
            'surname' => 'required|alpha|min:2|max:50',
            'nick_name' => 'max:50',
            'gender' => 'required',
            'date_of_birth' => 'required|before:today',
            'position' => 'max:50',
            'branch' => 'max:50',
            'chat' => 'max:200',
            'skype' => 'max:200',
        ];

        $valid = Validator::make($request->all(), $rule);

        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }

        try {
            $saler = $this->Saler
                ->whereId($salerId)
                ->first();

            $saler->email = $request->email;
            $saler->surname = $request->surname;
            $saler->name = $request->name;
            $saler->nick_name = $request->nick_name;
            $saler->gender = $request->gender;
            $saler->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
            $saler->position = $request->position;
            $saler->branch = $request->branch;
            $saler->mobile = $request->mobile;
            $saler->chat = $request->chat;
            $saler->skype = $request->skype;
            $saler->save();
            Session::flash('msg', 'Saler has been updated!');
            return redirect('/saler');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }

    public function destroy(Request $request, $id) {
        try{
            if($id>0) {
                $saler = $this->Saler->find($id);
                $saler->delete();
                return 'true';
            }
            return 'false';
        }catch(Exception $exception){
            return 'false';
        }
    }
}


