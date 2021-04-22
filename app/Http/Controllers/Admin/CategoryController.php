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

class CategoryController extends AdminController
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
            $category = $this->Category
                ->orderBy('id','DESC');
            //    $fromdate = $request->fromdate;
            //    $todate = $request->todate;
            //    if ($fromdate || $todate) {
            //        $broker = $broker->whereBetween('created_at', [$fromdate, $todate]);
            //    }
    
                $search = $request->search;
                if($search){
                    $category = $category->where(function($query) use($search){
                        $query->where('name','LIKE','%'.$search.'%')
                            ->orWhere('status','LIKE','%'.$search.'%');
                           
                        });
                }
                $category = $category->paginate(100);
                return response()->json([
                    View::make('admin.payble.category.data',compact('category'))->render()
                    
                ]);
        }
        return view('admin.payble.category.index');
    }
    public function store(Request $request) {
        $rule = [
            'name' => 'required|unique:expense_category,name',
 
        ];
    

        $valid = Validator::make($request->all(), $rule);

        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid->errors())
                ->withInput();
        }

        try {
            $category = $this->Category;
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
            Session::flash('msg', 'category has been added!');
            return redirect('/category');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
    }

  
    public function edit(Request $request) {
         
        $id = decrypt($request->categoryId);
        try {
            if($id>0) {
                $categoryData = $this->Category
                                    ->whereId($id)
                                    ->first();
                return ['categoryData'=>$categoryData];
            }
        } catch (Exception $exception) {
            return redirect('/category');
        }   
            try {
                $category = $this->Category
                    ->whereId($categoryId)
                    ->first();
     
                    return view('admin.payble.category.edit', compact('category'));
                } catch (Exception $exception) {
                    log::debug($exception);
                    abort(500);
                }
                return view('admin.payble.category.edit');
            }

        public function update(Request $request) {
            try {
                $categoryId = decrypt($request->category_id);
            } catch (Exception $exception) {
                Session::flash('msg', 'Oops, Please try again!');
                return redirect('/Category');
            }
    
          $rule = [
            'name' => 'required',
            
          ];
    
    
          $valid = Validator::make($request->all(), $rule);
    
          if($valid->fails()){
              return redirect()->back()
                  ->withErrors($valid->errors())
                  ->withInput();
          }
    
            try {
                $category = $this->Category
                    ->whereId($categoryId)
                    ->first();
    
                $category->name = $request->name;
               
                $category->save();
                Session::flash('msg', 'category has been updated!');
                return redirect('/category');
            } catch (Exception $exception) {
                log::debug($exception);
                abort(500);
            }
        }
        public function destroy(Request $request, $id) {
            try{
                if($id>0) {
                    $category = $this->Category->find($id);
                    $category->delete();
                    return 'true';
                }
                return 'false';
            }catch(Exception $exception){
                return 'false';
            }
        }
       
}
