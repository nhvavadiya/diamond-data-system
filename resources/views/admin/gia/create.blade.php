
@extends('templates.master')
@section('content')
<style>
label
{
    margin-bottom:0px !important;
}
.row
{
    margin-top : 10px !important;
}
</style>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3>Add Gia</h3>
            
            {{Form::open([ 'url' => '/store-gia', 'method' => 'post','class' => 'form gia-form' ])}}
                       <div class="modal-body mx-1">
                             <div class="row">
                                <div class="col-md-3">
                                     <label for="label-control">Stock</label>  
                                    {{ Form::text('stock', null, [
                                        'class' => 'form-control stock  form-control-sm',
                                        'required'
                                    ])}}
                                 </div>
                                <div class="col-md-3">
                                     <label for="label-control">Availability</label>  
                                    {{ Form::text('availability', null, [
                                        'class' => 'form-control availability  form-control-sm',
                                        'required'
                                    ])}}
                                 </div>
                                <div class="col-md-3">
                                     <label for="label-control">Shape</label>  
                                    {{ Form::text('shape', null, [
                                        'class' => 'form-control shape  form-control-sm',
                                        'required'
                                    ])}}
                                 </div>
                                  <div class="col-md-3">
                                        <label for="label-control">Weight</label>  
                                       {{ Form::text('weight', null, [
                                           'class' => 'form-control weight  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                              </div>
                              <div class="row">
                              <div class="col-md-3">
                                        <label for="label-control">Color</label>  
                                       {{ Form::text('Color', null, [
                                           'class' => 'form-control Color  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Clarity</label>  
                                       {{ Form::text('clarity', null, [
                                           'class' => 'form-control clarity  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Cut_grade</label>  
                                       {{ Form::text('cut_grade', null, [
                                           'class' => 'form-control cut_grade  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Polish</label>  
                                       {{ Form::text('polish', null, [
                                           'class' => 'form-control polish  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                </div>
                                <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Symmetry</label>  
                                       {{ Form::text('symmetry', null, [
                                           'class' => 'form-control symmetry  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                             
                              
                                 <div class="col-md-3">
                                        <label for="label-control">Fluorescence Intensity</label>  
                                       {{ Form::text('fluorescence_intensity', null, [
                                           'class' => 'form-control fluorescence_intensity  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Fluorescence Color</label>  
                                       {{ Form::text('fluorescence_color', null, [
                                           'class' => 'form-control fluorescence_color  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Measurements</label>  
                                       {{ Form::text('measurements', null, [
                                           'class' => 'form-control measurements  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 </div>
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Lab</label>  
                                       {{ Form::text('lab', null, [
                                           'class' => 'form-control lab  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                             
                              
                                 <div class="col-md-3">
                                        <label for="label-control">Report</label>  
                                       {{ Form::text('report', null, [
                                           'class' => 'form-control report  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Treatment</label>  
                                       {{ Form::text('treatment', null, [
                                           'class' => 'form-control treatment  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Rapnet Price</label>  
                                       {{ Form::text('rapnet_price', null, [
                                           'class' => 'form-control rapnet_price  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 </div>
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Rapnet Discount</label>  
                                       {{ Form::text('rapnet_discount', null, [
                                           'class' => 'form-control rapnet_discount  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                             
                             
                                 <div class="col-md-3">
                                        <label for="label-control">Cash Price</label>  
                                       {{ Form::text('cash_price', null, [
                                           'class' => 'form-control cash_price  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Cash Price Discount</label>  
                                       {{ Form::text('cash_price_discount', null, [
                                           'class' => 'form-control cash_price_discount  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Fancy Color</label>  
                                       {{ Form::text('fancy_color', null, [
                                           'class' => 'form-control fancy_color  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 </div>
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Fancy Color Intensity</label>  
                                       {{ Form::text('fancy_color_intensity', null, [
                                           'class' => 'form-control fancy_color_intensity  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                         
                            
                                 <div class="col-md-3">
                                        <label for="label-control">Fancy Color Overtone</label>  
                                       {{ Form::text('fancy_color_overtone', null, [
                                           'class' => 'form-control fancy_color_overtone  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Depth</label>  
                                       {{ Form::text('depth', null, [
                                           'class' => 'form-control depth  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Table</label>  
                                       {{ Form::text('table', null, [
                                           'class' => 'form-control table  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 </div>
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Girdle Thin</label>  
                                       {{ Form::text('girdle_thin', null, [
                                           'class' => 'form-control girdle_thin  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                             
                             
                                 <div class="col-md-3">
                                        <label for="label-control">Girdle Thick</label>  
                                       {{ Form::text('girdle_thick', null, [
                                           'class' => 'form-control girdle_thick  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Girdle</label>  
                                       {{ Form::text('girdle', null, [
                                           'class' => 'form-control girdle  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Girdle Condition</label>  
                                       {{ Form::text('girdle_condition', null, [
                                           'class' => 'form-control girdle_condition  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 </div>
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Culet Size</label>  
                                       {{ Form::text('culet_size', null, [
                                           'class' => 'form-control culet_size  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                
                               
                                 <div class="col-md-3">
                                        <label for="label-control">Culet Condition</label>  
                                       {{ Form::text('culet_condition', null, [
                                           'class' => 'form-control culet_condition  form-control-sm',
                                           'required'
                                       ])}}
                                 </div> 
                                 <div class="col-md-3">
                                        <label for="label-control">Crown Height</label>  
                                       {{ Form::text('crown_height', null, [
                                           'class' => 'form-control crown_height  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Crown Angle</label>  
                                       {{ Form::text('crown_angle', null, [
                                           'class' => 'form-control crown_angle  form-control-sm',
                                           'required'
                                       ])}}
                                    </div>
                                </div>
                                <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Pavilion Depth</label>  
                                       {{ Form::text('pavilion_depth', null, [
                                           'class' => 'form-control pavilion_depth  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                
                                
                                 <div class="col-md-3">
                                        <label for="label-control">Pavilion Dngle</label>  
                                       {{ Form::text('pavilion_dngle', null, [
                                           'class' => 'form-control pavilion_dngle  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                              
                                
                                 <div class="col-md-3">
                                        <label for="label-control">Laser Inscription</label>  
                                       {{ Form::text('laser_inscription', null, [
                                           'class' => 'form-control laser_inscription  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Cert Comment</label>  
                                       {{ Form::text('cert_comment', null, [
                                           'class' => 'form-control cert_comment  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>  
                                 </div>
                                 <div class="row">  
                                 <div class="col-md-3">
                                        <label for="label-control">Country</label>  
                                       {{ Form::text('country', null, [
                                           'class' => 'form-control country  form-control-sm',
                                           'required'
                                       ])}}
                                 </div> 
                                
                                
                                 <div class="col-md-3">
                                        <label for="label-control">State</label>  
                                       {{ Form::text('state', null, [
                                           'class' => 'form-control state  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                
                                 <div class="col-md-3">
                                        <label for="label-control">City</label>  
                                       {{ Form::text('city', null, [
                                           'class' => 'form-control city  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Is Matched Pair Separable</label>  
                                       {{ Form::text('is_matched_pair_separable', null, [
                                           'class' => 'form-control is_matched_pair_separable  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>    
                                 </div> 
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Pair Stock</label>  
                                       {{ Form::text('pair_stock', null, [
                                           'class' => 'form-control pair_stock  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                
                                 <div class="col-md-3">
                                        <label for="label-control">Allow RapLink Feed</label>  
                                       {{ Form::text('allow_rapLink_feed', null, [
                                           'class' => 'form-control allow_rapLink_feed  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Parcel Stones</label>  
                                       {{ Form::text('parcel_stones', null, [
                                           'class' => 'form-control parcel_stones  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Report Filename</label>  
                                       {{ Form::text('report_filename', null, [
                                           'class' => 'form-control report_filename  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 </div> 
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Diamond Image</label>  
                                       {{ Form::text('diamond_image', null, [
                                           'class' => 'form-control diamond_image  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                
                                 <div class="col-md-3">
                                        <label for="label-control">Sarine Loupe</label>  
                                       {{ Form::text('sarine_loupe', null, [
                                           'class' => 'form-control sarine_loupe  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Trade Show</label>  
                                       {{ Form::text('trade_show', null, [
                                           'class' => 'form-control trade_show  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Key To Symbols</label>  
                                       {{ Form::text('key_to_symbols', null, [
                                           'class' => 'form-control key_to_symbols  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 </div>
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Shade</label>  
                                       {{ Form::text('shade', null, [
                                           'class' => 'form-control shade  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                               
                                 <div class="col-md-3">
                                        <label for="label-control">Star Length</label>  
                                       {{ Form::text('star_length', null, [
                                           'class' => 'form-control star_length  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Center Inclusion</label>  
                                       {{ Form::text('center_inclusion', null, [
                                           'class' => 'form-control center_inclusion  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Black Inclusion</label>  
                                       {{ Form::text('black_inclusion', null, [
                                           'class' => 'form-control black_inclusion  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 </div>
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Milky</label>  
                                       {{ Form::text('milky', null, [
                                           'class' => 'form-control milky  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                
                                 <div class="col-md-3">
                                        <label for="label-control">Member Comment</label>  
                                       {{ Form::text('member_comment', null, [
                                           'class' => 'form-control member_comment  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Report Issue Date</label>  
                                       {{ Form::text('report_issue_date', null, [
                                           'class' => 'form-control report_issue_date  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 <div class="col-md-3">
                                        <label for="label-control">Report Type</label>  
                                       {{ Form::text('report_type', null, [
                                           'class' => 'form-control report_type  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                 </div> 
                                 <div class="row">
                                 <div class="col-md-3">
                                        <label for="label-control">Lab Location</label>  
                                       {{ Form::text('lab_location', null, [
                                           'class' => 'form-control lab_location  form-control-sm',
                                           'required'
                                       ])}}
                                 </div>
                                
                                 <div class="col-md-3">
                                        <label for="label-control">Brand</label>  
                                       {{ Form::text('brand', null, [
                                           'class' => 'form-control brand  form-control-sm',
                                           'required'
                                       ])}}
                                 </div> 
                                 </div>
                        </div>
                    {{ Form::submit('Save',[  'class' => 'btn btn-primary btn-sm']) }}
                    <a href="{{URL::to('/gia')}}"class="btn btn-light btn-sm">Cancel</a>
         
            {{ Form::close() }}

            </div>
        </div>
    </div>
@stop

       

        