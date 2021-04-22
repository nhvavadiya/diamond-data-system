<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Session;
use Validator;
use View;
use Log;
use Exception;
use DB;
use DataTables;

class PurchaserController extends AdminController
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $purchaser = $this->Purchaser->orderBy('id', 'DESC');

          //  $fromdate = $request->fromdate;
          //  $todate = $request->todate;
          //  if ($fromdate || $todate) {
          //      $purchaser = $purchaser->whereBetween('created_at', [$fromdate, $todate]);
          //  }

            $search = $request->search;
            if($search){
                $purchaser = $purchaser->where(function($query) use($search){
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
            $purchaser = $purchaser->paginate(100);
                return response()->json([
                    View::make('admin.purchasers.data',compact('purchaser'))->render()
                ]);
        }
        return view('admin.purchasers.index');
    }

    public function add() {
        return view('admin.purchasers.create');
    }

    public function store(Request $request) {
        $rule = [
            'email' => 'required|email|min:2|max:50|unique:purchasers,email',
            'name' => 'required|alpha|min:2|max:50',
            'surname' => 'required|alpha|min:2|max:50',
            'nick_name' => 'max:50',
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
            $purchaser = $this->Purchaser;
            $purchaser->email = $request->email;
            $purchaser->surname = $request->surname;
            $purchaser->name = $request->name;
            $purchaser->nick_name = $request->nick_name;
            $purchaser->position = $request->position;
            $purchaser->branch = $request->branch;
            $purchaser->mobile = $request->mobile;
            $purchaser->chat = $request->chat;
            $purchaser->skype = $request->skype;
            $purchaser->save();
            Session::flash('msg', 'Purchaser has been added!');
            return redirect('/purchaser');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }

    public function edit(Request $request) {

        $id = decrypt($request->purchaserId);
        try {
            if($id>0) {
                $purchaserData = $this->Purchaser
                                    ->whereId($id)
                                    ->first();
                return ['purchaserData'=>$purchaserData];
            }
        } catch (Exception $exception) {
            return redirect('/purchaser');
        }

        try {
            $purchaser = $this->Purchaser
                ->whereId($purchaserId)
                ->first();

            return view('admin.purchasers.edit', compact('purchaser'));
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
        return view('admin.purchasers.edit');
    }


    public function update(Request $request) {
        try {
            $purchaserId = decrypt($request->purchaser_id);
        } catch (Exception $exception) {
            Session::flash('msg', 'Oops, Please try again!');
            return redirect('/purchaser');
        }

        $rule = [
            'email' => 'email|min:2|max:50|unique:purchasers,email,' . $purchaserId,
            'name' => 'required|alpha|min:2|max:50',
            'surname' => 'required|alpha|min:2|max:50',
            'nick_name' => 'max:50',
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
            $purchaser = $this->Purchaser
                ->whereId($purchaserId)
                ->first();

            $purchaser->email = $request->email;
            $purchaser->surname = $request->surname;
            $purchaser->name = $request->name;
            $purchaser->nick_name = $request->nick_name;
            $purchaser->position = $request->position;
            $purchaser->branch = $request->branch;
            $purchaser->mobile = $request->mobile;
            $purchaser->chat = $request->chat;
            $purchaser->skype = $request->skype;
            $purchaser->save();
            Session::flash('msg', 'Purchaser has been updated!');
            return redirect('/purchaser');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }

    public function destroy(Request $request, $id) {
        try{
            if($id>0) {
                $purchaser = $this->Purchaser->find($id);
                $purchaser->delete();
                return 'true';
            }
            return 'false';
        }catch(Exception $exception){
            return 'false';
        }
    }
}

