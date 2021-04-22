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

class BrokerController extends AdminController
{
    public function index(Request $request) {
        // if($request->ajax()){

        //     $broker = $this->Broker;
        //     $search = $request->search;
        //     $date = $request->date;

        //     if ($request->search) {
        //         $broker = $this->Broker
        //             ->where('name', 'LIKE', '%' . $search . '%')
        //             ->orWhere('surname', 'LIKE', '%' . $search . '%');
        //     }

        //     if ($request->date) {
        //         $date = explode('-', $date);
        //         $startDate = Carbon::createFromFormat('d/m/Y', trim($date[0]))->format('Y-m-d');
        //         $endDate = Carbon::createFromFormat('d/m/Y', trim($date[1]))->format('Y-m-d');
        //         $broker = $broker->whereBetween('date_of_birth', [$startDate, $endDate]);
        //     }

        //     $broker = $broker->paginate(15);
        //     $data['broker'] = View::make('admin.brokers.data', compact('broker'))->render();
        //     return $data;
        // }
        if ($request->ajax()) {
            $broker = $this->Broker->select("*",
                \DB::raw('
                    (CASE
                        WHEN gender = "1" THEN "Male"
                        WHEN gender = "2" THEN "Female"
                    END)
                    AS gender'),
                DB::raw('
                    DATE_FORMAT(brokers.date_of_birth, "%d-%m-%Y") as date_of_birth'
                ))
                ->orderBy('id','DESC');
            //    $fromdate = $request->fromdate;
            //    $todate = $request->todate;
            //    if ($fromdate || $todate) {
            //        $broker = $broker->whereBetween('created_at', [$fromdate, $todate]);
            //    }
    
                $search = $request->search;
                if($search){
                    $broker = $broker->where(function($query) use($search){
                        $query->where('email','LIKE','%'.$search.'%')
                            ->orWhere('surname','LIKE','%'.$search.'%')
                            ->orWhere('name','LIKE','%'.$search.'%')
                            ->orWhere('mobile','LIKE','%'.$search.'%')
                            ->orWhere('chat','LIKE','%'.$search.'%')
                            ->orWhere('skype','LIKE','%'.$search.'%');
                        });
                }
                $broker = $broker->paginate(100);
                return response()->json([
                    View::make('admin.brokers.data',compact('broker'))->render()
                ]);
        }
        return view('admin.brokers.index');
    }

    public function add() {
        return view('admin.brokers.create');
    }

    public function store(Request $request) {
        $rule = [
            'email' => 'required|email|min:2|max:50|unique:brokers,email',
            'name' => 'required|alpha|min:2|max:50',
            'surname' => 'required|alpha|min:2|max:50',
            'gender' => 'required',
            'date_of_birth' => 'required|before:today',
            'reference' => 'max:50',
            'address' => 'required',
            'fax' => 'max:200',
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
            $broker = $this->Broker;
            $broker->email = $request->email;
            $broker->surname = $request->surname;
            $broker->name = $request->name;
            $broker->gender = $request->gender;
            $broker->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
            $broker->reference = $request->reference;
            $broker->address = $request->address;
            $broker->mobile = $request->mobile;
            $broker->other_mobile = $request->other_mobile;
            $broker->fax = $request->fax;
            $broker->chat = $request->chat;
            $broker->skype = $request->skype;
            $broker->save();
            Session::flash('msg', 'Broker has been added!');
            return redirect('/broker');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }

    public function edit(Request $request) {
         
        $id = decrypt($request->brokerId);
        try {
            if($id>0) {
                $brokerData = $this->Broker
                                    ->whereId($id)
                                    ->first();
                return ['brokerData'=>$brokerData];
            }
        } catch (Exception $exception) {
            return redirect('/broker');
        }

        try {
            $broker = $this->Broker
                ->whereId($brokerId)
                ->first();

            return view('admin.brokers.edit', compact('broker'));
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
        return view('admin.brokers.edit');
    }
    

    public function update(Request $request) {
        try {
            $brokerId = decrypt($request->broker_id);
        } catch (Exception $exception) {
            Session::flash('msg', 'Oops, Please try again!');
            return redirect('/broker');
        }
        $rule = [
            'email' => 'required|email|min:2|max:50|unique:brokers,email,' . $brokerId,
            'name' => 'required|alpha|min:2|max:50',
            'surname' => 'required|alpha|min:2|max:50',
            'gender' => 'required',
            'date_of_birth' => 'required|before:today',
            'reference' => 'max:50',
            'address' => 'required',
            'fax' => 'max:200',
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
            $broker = $this->Broker
                ->whereId($brokerId)
                ->first();

            $broker->email = $request->email;
            $broker->surname = $request->surname;
            $broker->gender = $request->gender;
             $broker->date_of_birth = Carbon::parse($request->date_of_birth)->format('y-m-d');
             $broker->name = $request->name;
             $broker->reference = $request->reference;
             $broker->address = $request->address;
             $broker->mobile = $request->mobile;
             $broker->other_mobile = $request->other_mobile;
             $broker->fax = $request->fax;
             $broker->chat = $request->chat;
             $broker->skype = $request->skype;
            $broker->save();
            Session::flash('msg', 'Broker has been updated!');
            return redirect('/broker');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }
    public function destroy(Request $request, $id) {
        try{
            if($id>0) {
                $broker = $this->Broker->find($id);
                $broker->delete();
                return 'true';
            }
            return 'false';
        }catch(Exception $exception){
            return 'false';
        }
    }
}
