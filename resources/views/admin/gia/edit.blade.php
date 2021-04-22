@extends('templates.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3>Edit Gia</h3>
     
                 {{Form::open(['url'=>'gia/'.encrypt($gia->id),'method'=>'put','class'=>'form','files'=>'true'])}}
                
                       <div class="modal-body mx-1">
                     
                                       <div class="row">
                                          <div class="col-md-3">
                                               <label for="label-control">Stock<span> </span></label>
                                                {{ Form::text('stock',$gia->stock, [ 'class' => 'form-control stock form-control-sm','id' => 'stock-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Availability<span> </span></label>
                                                {{ Form::text('availability',$gia->availability, [ 'class' => 'form-control availability form-control-sm','id' => 'availability-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Shape<span> </span></label>
                                                {{ Form::text('shape', $gia->shape, [ 'class' => 'form-control shape form-control-sm','required','id' => 'shape-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Weight<span> </span></label>
                                                {{ Form::text('weight', $gia->weight, [ 'class' => 'form-control weight form-control-sm','required','id' => 'weight-edit'])}}
                                           </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-3">
                                               <label for="label-control">Color<span> </span></label>
                                                {{ Form::text('color', $gia->color, [ 'class' => 'form-control color  form-control-sm','id' => 'color-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Clarity<span> </span></label>
                                                {{ Form::text('clarity', $gia->clarity, [ 'class' => 'form-control clarity form-control-sm','required','id' => 'clarity-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Cut Grade<span> </span></label>
                                                {{ Form::text('cut_grade', $gia->cut_grade, [ 'class' => 'form-control cut_grade form-control-sm','id' => 'cut_grade-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Polish<span> </span></label>
                                                {{ Form::text('polish', $gia->polish, [ 'class' => 'form-control polish form-control-sm','id' => 'polish-edit'])}}
                                           </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-3">
                                               <label for="label-control">Symmetry<span> </span></label>
                                                {{ Form::text('symmetry', $gia->symmetry, [ 'class' => 'form-control symmetry form-control-sm','id' => 'symmetry-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Fluorescence Intensity<span> </span></label>
                                                {{ Form::text('fluorescence_intensity', $gia->fluorescence_intensity, [ 'class' => 'form-control fluorescence_intensity form-control-sm','id' => 'fluorescence_intensity-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Fluorescence Color<span> </span></label>
                                                {{ Form::text('fluorescence_color', $gia->fluorescence_color, [ 'class' => 'form-control fluorescence_color form-control-sm','id' => 'fluorescence_color-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Measurements<span> </span></label>
                                                {{ Form::text('measurements', $gia->measurements, [ 'class' => 'form-control measurements form-control-sm','id' => 'measurements-edit'])}}
                                           </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-3">
                                               <label for="label-control">Lab<span> </span></label>
                                                {{ Form::text('lab', $gia->lab, [ 'class' => 'form-control lab form-control-sm','id' => 'lab-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Report<span> </span></label>
                                                {{ Form::text('report',  $gia->report, [ 'class' => 'form-control report form-control-sm','id' => 'report-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Treatment<span> </span></label>
                                                {{ Form::text('treatment', $gia->treatment, [ 'class' => 'form-control treatment form-control-sm','id' => 'treatment-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Rapnet Price<span> </span></label>
                                                {{ Form::text('rapnet_price',  $gia->rapnet_price, [ 'class' => 'form-control rapnet_price form-control-sm','id' => 'rapnet_price-edit'])}}
                                           </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-3">
                                               <label for="label-control">Rapnet Discount<span> </span></label>
                                                {{ Form::text('rapnet_discount',  $gia->rapnet_discount, [ 'class' => 'form-control rapnet_discount form-control-sm','id' => 'rapnet_discount-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Cash Price<span> </span></label>
                                                {{ Form::text('cash_price',  $gia->cash_price, [ 'class' => 'form-control cash_price form-control-sm','id' => 'cash_price-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Cash Price Discount<span> </span></label>
                                                {{ Form::text('cash_price_discount',  $gia->cash_price_discount, [ 'class' => 'form-control cash_price_discount form-control-sm','required','id' => 'cash_price_discount-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Fancy Color<span> </span></label>
                                                {{ Form::text('fancy_color',  $gia->fancy_color, [ 'class' => 'form-control fancy_color form-control-sm','required','id' => 'fancy_color-edit'])}}
                                           </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3">
                                               <label for="label-control">Fancy Color Intensity<span> </span></label>
                                                {{ Form::text('fancy_color_intensity',  $gia->fancy_color_intensity, [ 'class' => 'form-control fancy_color_intensity form-control-sm','required','id' => 'fancy_color_intensity-edit'])}}
                                           </div>
                                          <div class="col-md-3">
                                               <label for="label-control">Fancy Color Overtone<span> </span></label>
                                                {{ Form::text('fancy_color_overtone',  $gia->fancy_color_overtone, [ 'class' => 'form-control fancy_color_overtone form-control-sm','required','id' => 'fancy_color_overtone-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Depth<span> </span></label>
                                                {{ Form::text('depth',  $gia->depth, [ 'class' => 'form-control depth form-control-sm','required','id' => 'depth-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Table<span> </span></label>
                                                {{ Form::text('table',  $gia->table, [ 'class' => 'form-control table form-control-sm','required','id' => 'table-edit'])}}
                                           </div>
                                           </div>
                                        <div class="row">
                                           <div class="col-md-3">
                                               <label for="label-control">Girdle Thin<span> </span></label>
                                                {{ Form::text('girdle_thin',  $gia->girdle_thin, [ 'class' => 'form-control girdle_thin form-control-sm','required','id' => 'girdle_thin-edit'])}}
                                           </div>
                                       
                                          <div class="col-md-3">
                                               <label for="label-control">Girdle Thick<span> </span></label>
                                                {{ Form::text('girdle_thick',  $gia->girdle_thick, [ 'class' => 'form-control girdle_thick form-control-sm','required','id' => 'girdle_thick-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Girdle<span> </span></label>
                                                {{ Form::text('girdle',  $gia->girdle, [ 'class' => 'form-control girdle form-control-sm','required','id' => 'girdle-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Girdle Condition<span> </span></label>
                                                {{ Form::text('girdle_condition',  $gia->girdle_condition, [ 'class' => 'form-control girdle_condition form-control-sm','required','id' => 'girdle_condition-edit'])}}
                                           </div>
                                           </div>
                                        <div class="row">
                                           <div class="col-md-3">
                                               <label for="label-control">Culet Size<span> </span></label>
                                                {{ Form::text('culet_size',  $gia->culet_size, [ 'class' => 'form-control culet_size-edit form-control-sm','required','id' => 'culet_size-edit'])}}
                                           </div>
                                        
                                          <div class="col-md-3">
                                               <label for="label-control">Culet Condition<span> </span></label>
                                                {{ Form::text('culet_condition',  $gia->culet_condition, [ 'class' => 'form-control culet_condition form-control-sm','required','id' => 'culet_condition-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Crown Height<span> </span></label>
                                                {{ Form::text('crown_height',  $gia->crown_height, [ 'class' => 'form-control crown_height form-control-sm','required','id' => 'crown_height-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Crown Angle<span> </span></label>
                                                {{ Form::text('crown_angle',  $gia->crown_angle, [ 'class' => 'form-control crown_angle  form-control-sm','required','id' => 'crown_angle-edit'])}}
                                           </div>
                                           </div>
                                        <div class="row">
                                           <div class="col-md-3">
                                               <label for="label-control">Pavilion Depth<span> </span></label>
                                                {{ Form::text('pavilion_depth',  $gia->pavilion_depth, [ 'class' => 'form-control pavilion_depth form-control-sm','required','id' => 'pavilion_depth-edit'])}}
                                           </div>
                                        
                                          <div class="col-md-3">
                                               <label for="label-control">Pavilion Dngle<span> </span></label>
                                                {{ Form::text('pavilion_dngle',  $gia->pavilion_dngle, [ 'class' => 'form-control pavilion_dngle form-control-sm','required','id' => 'pavilion_dngle-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Laser Inscription<span> </span></label>
                                                {{ Form::text('laser_inscription',  $gia->laser_inscription, [ 'class' => 'form-control laser_inscription form-control-sm','required','id' => 'laser_inscription-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Cert Comment<span> </span></label>
                                                {{ Form::text('cert_comment',  $gia->cert_comment, [ 'class' => 'form-control cert_comment form-control-sm','required','id' => 'cert_comment-edit'])}}
                                           </div>
                                           </div>
                                        <div class="row">
                                           <div class="col-md-3">
                                               <label for="label-control">Country<span> </span></label>
                                                {{ Form::text('country',  $gia->country, [ 'class' => 'form-control country form-control-sm','required','id' => 'country-edit'])}}
                                           </div>
                                       
                                          <div class="col-md-3">
                                               <label for="label-control">State<span> </span></label>
                                                {{ Form::text('state',  $gia->state, [ 'class' => 'form-control State form-control-sm','required','id' => 'state-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">City<span> </span></label>
                                                {{ Form::text('city',  $gia->city, [ 'class' => 'form-control city form-control-sm','required','id' => 'city-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Is Matched Pair Separable<span> </span></label>
                                                {{ Form::text('is_matched_pair_separable',  $gia->is_matched_pair_separable, [ 'class' => 'form-control is_matched_pair_separable form-control-sm','required','id' => 'is_matched_pair_separable-edit'])}}
                                           </div>
                                           </div>
                                        <div class="row">
                                           <div class="col-md-3">
                                               <label for="label-control">Pair Stock<span> </span></label>
                                                {{ Form::text('pair_stock',  $gia->pair_stock, [ 'class' => 'form-control pair_stock form-control-sm','required','id' => 'pair_stock-edit'])}}
                                           </div>
                                       
                                          <div class="col-md-3">
                                               <label for="label-control">Allow RapLink Feed<span> </span></label>
                                                {{ Form::text('allow_rapLink_feed',  $gia->allow_rapLink_feed, [ 'class' => 'form-control allow_rapLink_feed form-control-sm','required','id' => 'allow_rapLink_feed-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Parcel Stones<span> </span></label>
                                                {{ Form::text('parcel_stones',  $gia->parcel_stones, [ 'class' => 'form-control parcel_stones form-control-sm','required','id' => 'parcel_stones-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Report Filename<span> </span></label>
                                                {{ Form::text('report_filename',  $gia->report_filename, [ 'class' => 'form-control report_filename form-control-sm','required','id' => 'report_filename-edit'])}}
                                           </div>
                                           </div>
                                        <div class="row">
                                           <div class="col-md-3">
                                               <label for="label-control">Diamond Image<span> </span></label>
                                                {{ Form::text('diamond_image',  $gia->diamond_image, [ 'class' => 'form-control diamond_image form-control-sm','required','id' => 'diamond_image-edit'])}}
                                           </div>
                                       
                                          <div class="col-md-3">
                                               <label for="label-control">Sarine Loupe<span> </span></label>
                                                {{ Form::text('sarine_loupe',  $gia->sarine_loupe, [ 'class' => 'form-control sarine_loupe-edit form-control-sm','required','id' => 'sarine_loupe-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Trade Show<span> </span></label>
                                                {{ Form::text('trade_show',  $gia->trade_show, [ 'class' => 'form-control trade_show form-control-sm','required','id' => 'trade_show-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Key To Symbols<span> </span></label>
                                                {{ Form::text('key_to_symbols',  $gia->key_to_symbols, [ 'class' => 'form-control key_to_symbols form-control-sm','required','id' => 'key_to_symbols-edit'])}}
                                           </div>
                                           </div>
                                        <div class="row">
                                           <div class="col-md-3">
                                               <label for="label-control">Shade<span> </span></label>
                                                {{ Form::text('shade',  $gia->shade, [ 'class' => 'form-control shade form-control-sm','required','id' => 'shade-edit'])}}
                                           </div>
                                       
                                          <div class="col-md-3">
                                               <label for="label-control">Star Length<span> </span></label>
                                                {{ Form::text('star_length',  $gia->star_length, [ 'class' => 'form-control star_length form-control-sm','required','id' => 'star_length-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Center Inclusion<span> </span></label>
                                                {{ Form::text('center_inclusion',  $gia->center_inclusion, [ 'class' => 'form-control center_inclusion form-control-sm','required','id' => 'center_inclusion-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Black Inclusion<span> </span></label>
                                                {{ Form::text('black_inclusion',  $gia->black_inclusion, [ 'class' => 'form-control black_inclusion form-control-sm','required','id' => 'black_inclusion-edit'])}}
                                           </div>
                                           </div>
                                        <div class="row">
                                           <div class="col-md-3">
                                               <label for="label-control">Milky<span> </span></label>
                                                {{ Form::text('milky',  $gia->milky, [ 'class' => 'form-control milky form-control-sm','required','id' => 'milky-edit'])}}
                                           </div>
                                       
                                          <div class="col-md-3">
                                               <label for="label-control">Member Comment<span> </span></label>
                                                {{ Form::text('member_comment',  $gia->member_comment, [ 'class' => 'form-control member_comment form-control-sm','required','id' => 'member_comment-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Report Issue Date<span> </span></label>
                                                {{ Form::text('report_issue_date',  $gia->report_issue_date, [ 'class' => 'form-control report_issue_date form-control-sm','id' => 'report_issue_date-edit'])}}
                                           </div>
                                           <div class="col-md-3">
                                               <label for="label-control">Report Type<span> </span></label>
                                                {{ Form::text('report_type',  $gia->report_type, [ 'class' => 'form-control report_type form-control-sm','id' => 'report_type-edit'])}}
                                           </div>
                                           </div>
                                           <div class="row">
                                           
                                           <div class="col-md-3">
                                               <label for="label-control">Lab Location<span> </span></label>
                                                {{ Form::text('lab_location',  $gia->lab_location, [ 'class' => 'form-control lab_location form-control-sm','id' => 'lab_location-edit'])}}
                                           </div>
                                        
                                           <div class="col-md-3">
                                       <label for="label-control">Brand<span> </span></label>
                                                {{ Form::text('brand',  $gia->brand, [ 'class' => 'form-control brand form-control-sm','id' => 'brand-edit'])}}
                                    </div>
                                    </div>

                {{ Form::submit('Save',[  'class' => 'btn btn-primary btn-sm']) }}
                <a href="{{URL::to('/gia')}}"class="btn btn-light btn-sm">Cancel</a>

            {{ Form::close() }}
                      
            </div>
        </div>
    </div>
@stop