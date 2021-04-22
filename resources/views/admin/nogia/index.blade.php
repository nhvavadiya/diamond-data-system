@extends('templates.master')
@section('content')
<style>
select.form-control{
    border: 1px solid #c9ccd7;
    color : black;
}
</style>
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Nogia</strong>
                        </h3>
                    </div>
                    <div class="modal fade bd-example-modal-lg" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="width: 38%;">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title w-100 font-weight-bold">Add nogia</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body mx-1">
                              <div class="modal-body mx-1">
                                 {{Form::open(['url' => '/store-nogia','method' => 'post','autocomplete' => 'off','class' => 'form broker-form' ])}}

                                    <div class="row">
                                        <label for="label-control" class="col-md-3 col-form-label">Branch<span> </span></label>
                                        <div class="col-md-9">
                                            <select name="branch_id" class="form-control add_branch" id="branch_id" required>
                                                <option value=""></option>
                                                @foreach ($branches as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option> 
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="label-control" class="col-md-3 col-form-label">Details<span> </span></label>
                                        <div class="col-md-9">
                                            {{ Form::text('details', null, ['class' => 'form-control details', 'placeholder' => 'details','required','id' => 'details'])}}
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="pc" class="col-md-3 col-form-label">Pc<span> </span></label>
                                        <div class="col-md-9">
                                            {{ Form::text('pc', null, ['class' => 'form-control pc','placeholder' => 'pc', 'required','id' => 'pc'])}}
                                        </div>
                                    </div>
                                   <div class="row mt-3">
                                        <label for="carat" class="col-md-3 col-form-label">Carat<span> </span></label>
                                        <div class="col-md-9">
                                            {{ Form::text('carat', null, ['class' => 'form-control carat','placeholder' => 'carat','required','id' => 'carat'])}}
                                        </div>
                                   </div>
                                   <div class="row mt-3">
                                        <label for="price" class="col-md-3 col-form-label">Price<span> </span></label>
                                        <div class="col-md-9">
                                            {{ Form::text('price', null, ['class' => 'form-control price','placeholder' => 'carat','required','id' => 'price'])}}
                                        </div>
                                   </div>
                                   <div class="row mt-3">
                                        <label for="gender" class="col-md-3 col-form-label">Total<span> </span></label>
                                        <div class="col-md-9">
                                            {{ Form::text('total', null, ['class' => 'form-control total','placeholder' => 'total','required','id' => 'total'])}}
                                        </div>
                                     </div>
                                     </div>
                                   <div class="modal-footer d-flex justify">
                                     <button class="btn btn-primary btn-sm">submit</button>
                                     <button class="btn btn-light btn-sm" data-dismiss="modal">Cancel</a>
                                   </div>
                                   {{ Form::close() }}
                              
                              </div>
                           </div>
                        </div>
                   </div>
                   </div>

                <div class="body">
                    <!-- Nav tabs -->
                    
                    <div class="col-md-12">
                            <div class="row mt-3">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                   <ul class="nav nav-tabs padding-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <span class="input-group-addon search-border">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                          
                                        </div>
                                    </ul>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                   <!--<div class="input-group"><input type="text" class="form-control daterange" autocomplete="off" placeholder="Select Date">
                                    </div>-->
                                    <button type="button" class="btn btn-primary float-right btn-sm " data-toggle="modal" data-target="#modalRegisterForm">Add</button>

                                </div>
                            </div>
                        </div> 
                 
                    <!-- Tab panes -->
                    <div class="tab-content m-t-10">

                        <!-- notification -->
                        @if(Session::has('msg'))
                            <div class="alert alert-success notification">
                                <strong>Success!</strong> {{Session::get('msg')}}
                               
                            </div>
                        @endif

                        <div class="nogia-data table-responsive active">
                        
                        </div>
                    </div>
                    <!--edit-->
                    <div class="modal fade bd-example-modal-lg" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document" style="width: 38%;">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title w-100 font-weight-bold">Edit nogia</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body mx-1">
                              {{Form::open(['url' => '/update-nogia','method' => 'post','class' => 'form nogia-form' ])}}
                                   <div class="col-md-12-a">
                                          <label for="label-control">Details<span> </span></label>
                                        {{ Form::text('details', null, ['class' => 'form-control details-edit', 'placeholder' => 'details','required','id' => 'details-edit'])}}
                                    </div>
                                    <div class="col-md-12-a">
                                       <label for="pc">Pc<span> </span></label>
                                      {{ Form::text('pc', null, ['class' => 'form-control pc-edit','placeholder' => 'pc', 'required','id' => 'pc-edit'])}}
                                    </div>
                                   <div class="col-md-12-a">
                                        <label for="carat">Carat<span> </span></label>
                                         {{ Form::text('carat', null, ['class' => 'form-control carat-edit','placeholder' => 'carat','required','id' => 'carat-edit'])}}
                                   </div>
                                   <div class="col-md-12-a">
                                        <label for="price">Price<span> </span></label>
                                         {{ Form::text('price', null, ['class' => 'form-control price-edit','placeholder' => 'carat','required','id' => 'price-edit'])}}
                                   </div>
                                   <div class="col-md-12-a">
                                    <label for="gender">Total<span> </span></label>
                                    {{ Form::text('total', null, ['class' => 'form-control total-edit','placeholder' => 'Email','required','id' => 'total-edit'])}}

                                     </div>
                                     </div>
                                   <div class="modal-footer d-flex justify">
                                      {{ Form::hidden('nogia_id', null, ['class' => 'form-control','id'=>'nogia_id'])}}
                                      <button class="btn btn-primary btn-sm">submit</button>
                                      <button class="btn btn-light btn-sm" data-dismiss="modal">Cancel</a>
                                   </div>
                           {{ Form::close() }}
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
      var page = '';
        var search = '';
        var nogiaId = '';
        var fromdate = moment(new Date()).format('YYYY-MM-DD');
        var todate = moment(new Date()).format('YYYY-MM-DD');
        var qstring = 'fromdate=' + fromdate + '&todate=' + todate;

        $(document).ready(function(){

           // $('.daterange').daterangepicker({
          //     locale: {
          //         direction: 'drop-down-date-range',
          //         cancelLabel: 'Clear',
          //         format: 'D/M/Y'
          //     }
          // });
          // $('.daterange').on('apply.daterangepicker', function(ev, picker) {
          //     fromdate = picker.startDate.format('YYYY-MM-DD');
          //     todate = picker.endDate.format('YYYY-MM-DD');
          //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
          //     getSalerData(qstring);
          // });
          // $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
          //     $(".daterange").val('');
          //     fromdate = '';
          //     todate = '';
          //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
          //     getSalerData(qstring);
          // });
            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getNogiaData(qstring);
            });
            $(document).on('click','.delete-nogia',function(){
                salerId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getNogiaData(qstring);
            });
        });
        
        $(document).on('dblclick', '#nogia-table tbody tr', function(event) {
            var nogiaId = $(this).data('id');
            if(typeof(nogiaId) !== 'undefined'){
                var url = 'nogia/'+nogiaId+'/edit';
                $.ajax({
                        headers: {                              
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{URL::to('get-nogia-data')}}",
                        type: "POST",
                        data: {nogiaId:nogiaId, "_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                            }).done(function(data) {
                            // if(data.purchaserData != null){
                               
                                $('#nogia_id').val(nogiaId);
                                $('#details-edit').val(data.nogiaData.details);
                                $('#pc-edit').val(data.nogiaData.pc);
                                $('#carat-edit').val(data.nogiaData.carat);
                                $('#price-edit').val(data.nogiaData.price);
                                $('#total-edit').val(data.nogiaData.total);
                            // }
                       
                    }).fail(function(error) {

                });
                $('#modalEditForm').modal('show');
               
            }
        });
        getNogiaData(qstring);
        // get all expense data
        function getNogiaData(qstring){
            $.ajax({
                url: "{{URL::to('nogia')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.nogia-data').html(data);

            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this nogia!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removeNogia();
                swal("Deleted!", "Your nogia has been deleted.", "success");
            });
        }
        // remove expense
        function removeNogia(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-nogia')}}"+'/'+nogiaId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getNogiaData(qstring);
            }).fail(function() {

            });
        }
      
      
    </script>
 @endsection