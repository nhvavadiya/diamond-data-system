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

class CustomerController extends AdminController
{
    public function index(Request $request) {
        if ($request->ajax()) {
            
            $customer = $this->Customer->select("*",
                \DB::raw('
                    (CASE
                        WHEN gender = "1" THEN "Male"
                        WHEN gender = "2" THEN "Female"
                    END)
                    AS gender'),
    
                DB::raw('
                    DATE_FORMAT(customers.date_of_birth, "%d-%m-%Y") as date_of_birth'
                ))
                ->orderBy('id','DESC');
           //    $fromdate = $request->fromdate;
           //    $todate = $request->todate;
           //    if ($fromdate || $todate) {
           //        $customer = $customer->whereBetween('created_at', [$fromdate, $todate]);
           //    }
    
                $search = $request->search;
                if($search){
                    $customer = $customer->where(function($query) use($search){
                        $query->where('email','LIKE','%'.$search.'%')
                            ->orWhere('surname','LIKE','%'.$search.'%')
                            ->orWhere('name','LIKE','%'.$search.'%')
                            ->orWhere('mobile','LIKE','%'.$search.'%')
                            ->orWhere('position','LIKE','%'.$search.'%')
                            ->orWhere('skype','LIKE','%'.$search.'%')
                            ->orWhere('company_name','LIKE','%'.$search.'%')
                            ->orWhere('chat','LIKE','%'.$search.'%')
                            ->orWhere('skype','LIKE','%'.$search.'%');
                        
                        
                        });
                }
                $customer = $customer->paginate(100);

          
                return response()->json([
                    View::make('admin.customers.data',compact('customer'))->render()
                ]);
        }
        return view('admin.customers.index');
    }

    public function add() {
        return view('admin.customers.create');
    }

    public function store(Request $request) {
        $rule = [
            'email' => 'required|email|min:2|max:50|unique:customers,email',
            'name' => 'required|alpha|min:2|max:50',
            'surname' => 'required|alpha|min:2|max:50',
            'company_name' => 'max:50',
            'gender' => 'required',
            'position' => 'max:50',
            'date_of_birth' => 'required|before:today',
            'reference' => 'max:50',
            'position' => 'max:50',
            'address' => 'required',
            'fax' => 'max:200',
            'chat' => 'max:200',
            'skype' => 'max:200',
            'rapnet_id' => 'max:10',
            'website' => 'max:100',
            'contact_person' => 'max:50',
        ];

        $valid = Validator::make($request->all(), $rule);

        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }

        try {
            $customer = $this->Customer;
            $customer->email = $request->email;
            $customer->surname = $request->surname;
            $customer->name = $request->name;
            $customer->company_name = $request->company_name;
            $customer->position = $request->position;
            $customer->gender = $request->gender;
            $customer->date_of_birth = Carbon::parse($request->date_of_birth)->format('y-m-d');
            $customer->reference = $request->reference;
            $customer->address = $request->address;
            $customer->mobile = $request->mobile;
            $customer->other_mobile = $request->other_mobile;
            $customer->fax = $request->fax;
            $customer->chat = $request->chat;
            $customer->skype = $request->skype;
            $customer->rapnet_id = $request->rapnet_id;
            $customer->website = $request->website;
            $customer->whatsapp = $request->whatsapp;
            $customer->remark = $request->remark;
            $customer->contact_person = $request->contact_person;
            $customer->save();
            Session::flash('msg', 'Customer has been added!');
            return redirect('/customer');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
            
        }
    }


         public function edit(Request $request) {
         
            $id = decrypt($request->customerId);
            try {
                if($id>0) {
                    $customerData = $this->Customer
                                        ->whereId($id)
                                        ->first();
                    return ['customerData'=>$customerData];
                }
            } catch (Exception $exception) {
                return redirect('/customer');
            }   
                try {
                    $customer = $this->Customer
                        ->whereId($customerId)
                        ->first();
         
                    return view('admin.customers.edit', compact('customer'));
                } catch (Exception $exception) {
                    log::debug($exception);
                    abort(500);
                }
                return view('admin.customers.edit');
            }

    public function update(Request $request) {
        try {
            $customerId = decrypt($request->customer_id);
        } catch (Exception $exception) {
            Session::flash('msg', 'Oops, Please try again!');
            return redirect('/customer');
        }

        $rule = [
            'email' => 'required|email|min:2|max:50|unique:customers,email,' . $customerId,
            'name' => 'required|alpha|min:2|max:50',
            'surname' => 'required|alpha|min:2|max:50',
            'company_name' => 'max:50',
            'gender' => 'required',
            'position' => 'max:50',
            'date_of_birth' => 'required|before:today',
            'reference' => 'max:50',
            'position' => 'max:50',
            'address' => 'required',
            'mobile' => 'unique:customers,mobile,' . $customerId,
            'fax' => 'max:200',
            'chat' => 'max:200',
            'skype' => 'max:200',
            'rapnet_id' => 'max:10',
            'website' => 'max:100',
            'contact_person' => 'max:50',
        ];


        $valid = Validator::make($request->all(), $rule);

        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }

        try {
            $customer = $this->Customer
                ->whereId($customerId)
                ->first();

            $customer->email = $request->email;
            $customer->surname = $request->surname;
            $customer->name = $request->name;
            $customer->company_name = $request->company_name;
            $customer->gender = $request->gender;
            $customer->position = $request->position;
            $customer->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
            $customer->reference = $request->reference;
            $customer->address = $request->address;
            $customer->mobile = $request->mobile;
            $customer->other_mobile = $request->other_mobile;
            $customer->fax = $request->fax;
            $customer->chat = $request->chat;
            $customer->skype = $request->skype;
            $customer->rapnet_id = $request->rapnet_id;
            $customer->website = $request->website;
            $customer->whatsapp = $request->whatsapp;
            $customer->remark = $request->remark;
            $customer->contact_person = $request->contact_person;
            $customer->save();
            Session::flash('msg', 'Customer has been updated!');
            return redirect('/customer');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }

    public function destroy(Request $request, $id) {
        try{
            if($id>0) {
                $customer = $this->Customer->find($id);
                $customer->delete();
                return 'true';
            }
            return 'false';
        }catch(Exception $exception){
            return 'false';
        }
    }
}

