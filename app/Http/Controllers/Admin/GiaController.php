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

class GiaController extends  AdminController
{
    public function index(Request $request) {
        if ($request->ajax()) {
            
            $gia = $this->Gia
                ->orderBy('id','DESC');
           //    $fromdate = $request->fromdate;
           //    $todate = $request->todate;
           //    if ($fromdate || $todate) {
           //        $customer = $customer->whereBetween('created_at', [$fromdate, $todate]);
           //    }
    
                $search = $request->search;
                if($search){
                    $gia = $gia->where(function($query) use($search){
                        $query->where('shape','LIKE','%'.$search.'%')
                            ->orWhere('clarity','LIKE','%'.$search.'%')
                            ->orWhere('fancy_color','LIKE','%'.$search.'%')
                            ->orWhere('fancy_color_intensity','LIKE','%'.$search.'%')
                            ->orWhere('fancy_color_overtone','LIKE','%'.$search.'%');
                            
                        
                        });
                }
                $gia = $gia->paginate(100);

          
                return response()->json([
                    View::make('admin.gia.data',compact('gia'))->render()
                ]);
        }
        return view('admin.gia.index');
    }
    public function add() {
        return view('admin.gia.create');
    }
    public function store(Request $request){
      
    
            $rule = [
                'shape' => 'required',
                'weight' => 'required',
                'clarity' => 'required',
                'fancy_color_intensity' => 'required',
                'fancy_color_overtone' => 'required',
               
            ];
            
       

            $valid = Validator::make($request->all(),$rule);

            if($valid->fails()){
                return redirect()->back()
                    ->withErrors($valid->errors())
                    ->withInput();
            }
            try{    
            $gia = $this->Gia;
            $gia->stock = $request->stock;
            $gia->availability = $request->availability;
            $gia->shape = $request->shape;
            $gia->weight = $request->weight;
            $gia->color = $request->color;
            $gia->clarity = $request->clarity;
            $gia->cut_grade = $request->cut_grade;
            $gia->polish = $request->polish;
            $gia->symmetry = $request->symmetry;
            $gia->fluorescence_intensity = $request->fluorescence_intensity;
            $gia->fluorescence_color = $request->fluorescence_color;
            $gia->measurements = $request->measurements;
            $gia->lab = $request->lab;
            $gia->report = $request->report;
            $gia->treatment = $request->treatment;
            $gia->rapnet_price = $request->rapnet_price;
            $gia->rapnet_discount = $request->rapnet_discount;
            $gia->cash_price = $request->cash_price;
            $gia->cash_price_discount = $request->cash_price_discount;
            $gia->fancy_color = $request->fancy_color;
            $gia->fancy_color_intensity = $request->fancy_color_intensity;
            $gia->fancy_color_overtone = $request->fancy_color_overtone;
            $gia->depth = $request->depth;
            $gia->table = $request->table;
            $gia->girdle_thin = $request->girdle_thin;
            $gia->girdle_thick = $request->girdle_thick;
            $gia->girdle = $request->girdle;
            $gia->girdle_condition = $request->girdle_condition;
            $gia->culet_size = $request->culet_size;
            $gia->culet_condition = $request->culet_condition;
            $gia->crown_height = $request->crown_height;
            $gia->crown_angle = $request->crown_angle;
            $gia->pavilion_depth = $request->pavilion_depth;
            $gia->pavilion_dngle = $request->pavilion_dngle;
            $gia->laser_inscription = $request->laser_inscription;
            $gia->cert_comment = $request->cert_comment;
            $gia->country = $request->country;
            $gia->state = $request->state;
            $gia->city = $request->city;
            $gia->is_matched_pair_separable = $request->is_matched_pair_separable;
            $gia->pair_stock = $request->pair_stock;
            $gia->allow_rapLink_feed = $request->allow_rapLink_feed;
            $gia->parcel_stones = $request->parcel_stones;
            $gia->report_filename = $request->report_filename;
            $gia->diamond_image = $request->diamond_image;
            $gia->sarine_loupe = $request->sarine_loupe;
            $gia->trade_show = $request->trade_show;
            $gia->key_to_symbols = $request->key_to_symbols;
            $gia->shade = $request->shade;
            $gia->star_length = $request->star_length;
            $gia->center_inclusion = $request->center_inclusion;
            $gia->black_inclusion = $request->black_inclusion;
            $gia->milky = $request->milky;
            $gia->member_comment = $request->member_comment;
            $gia->report_issue_date = $request->report_issue_date;
            $gia->report_type = $request->report_type;
            $gia->lab_location = $request->lab_location;
            $gia->brand = $request->brand;
            $gia->save();
            Session::flash('msg', 'gia has been added!');
            return redirect('/gia');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
        }
        }
    public function edit($id,Request $request) {
         
        if($request->ajax()){
            $giaId = $id;
        }
        else {
            $giaId = decrypt($id);
        }

        $gia = $this->Gia->where('id',$giaId)->first();

        if($request->ajax()){
            $data = [];
            $data['gia'] = $gia;
            return $data;
        }
        return view('admin.gia.edit',compact('gia'));
    }
    public function update(Request $request,$id){
        try {
            $id = decrypt($id);
        } catch (Exception $exception) {
            Session::flash('msg', 'Oops, Please try again!');
            return redirect('/gia');
        }

        try{
            // $rule = [
            //     'shape' => 'required',
            //     'weight' => 'required',
            //     'clarity' => 'required',
            //     'fancy_color_intensity' => 'required',
            //     'fancy_color_overtone' => 'required'
            // ];
            
            // $valid = Validator::make($request->all(),$rule);

            // if($valid->fails()){
            //     return redirect()->back()
            //         ->withErrors($valid->errors())
            //         ->withInput();
            // }
            $gia = $this->Gia->whereId($id)->first();
            
            $gia->stock = $request->stock;
            $gia->availability = $request->availability;
            $gia->shape = $request->shape;
            $gia->weight = $request->weight;
            $gia->color = $request->color;
            $gia->clarity = $request->clarity;
            $gia->cut_grade = $request->cut_grade;
            $gia->polish = $request->polish;
            $gia->symmetry = $request->symmetry;
            $gia->fluorescence_intensity = $request->fluorescence_intensity;
            $gia->fluorescence_color = $request->fluorescence_color;
            $gia->measurements = $request->measurements;
            $gia->lab = $request->lab;
            $gia->report = $request->report;
            $gia->treatment = $request->treatment;
            $gia->rapnet_price = $request->rapnet_price;
            $gia->rapnet_discount = $request->rapnet_discount;
            $gia->cash_price = $request->cash_price;
            $gia->cash_price_discount = $request->cash_price_discount;
            $gia->fancy_color = $request->fancy_color;
            $gia->fancy_color_intensity = $request->fancy_color_intensity;
            $gia->fancy_color_overtone = $request->fancy_color_overtone;
            $gia->depth = $request->depth;
            $gia->table = $request->table;
            $gia->girdle_thin = $request->girdle_thin;
            $gia->girdle_thick = $request->girdle_thick;
            $gia->girdle = $request->girdle;
            $gia->girdle_condition = $request->girdle_condition;
            $gia->culet_size = $request->culet_size;
            $gia->culet_condition = $request->culet_condition;
            $gia->crown_height = $request->crown_height;
            $gia->crown_angle = $request->crown_angle;
            $gia->pavilion_depth = $request->pavilion_depth;
            $gia->pavilion_dngle = $request->pavilion_dngle;
            $gia->laser_inscription = $request->laser_inscription;
            $gia->cert_comment = $request->cert_comment;
            $gia->country = $request->country;
            $gia->state = $request->state;
            $gia->city = $request->city;
            $gia->is_matched_pair_separable = $request->is_matched_pair_separable;
            $gia->pair_stock = $request->pair_stock;
            $gia->allow_rapLink_feed = $request->allow_rapLink_feed;
            $gia->parcel_stones = $request->parcel_stones;
            $gia->report_filename = $request->report_filename;
            $gia->diamond_image = $request->diamond_image;
            $gia->sarine_loupe = $request->sarine_loupe;
            $gia->trade_show = $request->trade_show;
            $gia->key_to_symbols = $request->key_to_symbols;
            $gia->shade = $request->shade;
            $gia->star_length = $request->star_length;
            $gia->center_inclusion = $request->center_inclusion;
            $gia->black_inclusion = $request->black_inclusion;
            $gia->milky = $request->milky;
            $gia->member_comment = $request->member_comment;
            $gia->report_issue_date = $request->report_issue_date;
            $gia->report_type = $request->report_type;
            $gia->lab_location = $request->lab_location;
            $gia->brand = $request->brand;
            $gia->save();
            Session::flash('msg', 'Saler has been updated!');
            return redirect('/gia');
        } catch (Exception $exception) {
            log::debug($exception);
            abort(500);
         
        }
    }


    public function destroy(Request $request, $id) {
        try{
            if($id>0) {
                $gia = $this->Gia->find($id);
                $gia->delete();
                return 'true';
            }
            return 'false';
        }catch(Exception $exception){
            return 'false';
        }
    }

}
