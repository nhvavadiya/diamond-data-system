@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Saler</strong>
                        </h3>
                    </div>
                        <div class="modal fade bd-example-modal-lg" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header ">
                                 <h4 class="modal-title w-100 font-weight-bold">Add Saler</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                               <div class="modal-body mx-1">
                                                           
                                    {{Form::open([ 'url' => '/store-saler', 'method' => 'post','autocomplete' => 'off','class' => 'form saler-form' ])}}
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                         <table class="tbl-purchas-header">
                                         <tr>
                                         <td class="meta-head">SURNAME</td>
                                            <td>{{ Form::text('surname', null, [ 'class' => 'form-control surname form-control-sm', 'required'])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('surname')}}
                                            </span>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="tbl-purchas-header">
                                <tr>
                                   <td class="meta-head">NAME</td>
                                   <td>{{ Form::text('name', null, [ 'class' => 'form-control name form-control-sm','required' ])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('name')}}
                                            </span>
                                        </tr>
                                    </table>
                                   </div>
                                   
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                    <table class="tbl-purchas-header">
                                        <tr>
                                            <td class="meta-head">NICK NAME</td>
                                            <td> {{ Form::text('nick_name', null, [ 'class' => 'form-control nick_name form-control-sm'])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('nick_name')}}
                                            </span>
                                        </span>
                                    </tr>
                                </table>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                 <table class="tbl-purchas-header ">
                                 <tr>
                                    <td class="meta-head">E-MAIL</td>
                                    <td> {{ Form::text('email', null, [ 'class' => 'form-control email form-control-sm', 'required' ])}}</td>
                                           <span class="error text-danger">
                                               {{$errors->first('email')}}
                                           </span>
                                        </tr>
                                    </table>
                                   </div>
                                   <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">MOBILE</td>
                                            <td>{{ Form::text('mobile', null, ['class' => 'form-control mobile form-control-sm','autocomplete' => 'off','oninput' => 'checkMobile(this.value)', 'maxlength' => 10, 'required' ])}}</td>
                                              <span class="error text-danger">
                                                  {{$errors->first('mobile')}}
                                              </span>
                                            </tr>
                                        </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">GENDER</td>
                                                <td> {{ Form::select('gender',[1 => 'Male', 2 => 'Female'], null, [ 'class' => 'form-control gender form-control-sm ','placeholder' => 'Select Gender', 'required'  ])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('gender')}}
                                            </span>
                                        </tr>
                                    </table>
                                   </div>
                                   <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">BIRTH DATE</td>
                                            <td>{{ Form::text('date_of_birth', null, [ 'class' => 'form-control date_of_birth form-control-sm', 'required', 'autocomplete' => 'off' ])}}</td>
                                             <span class="error text-danger">
                                                 {{$errors->first('date_of_birth')}}
                                             </span>
                                            </tr>
                                        </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                         <table class="tbl-purchas-header ">
                                         <tr>
                                            <td class="meta-head">POSITION</td>
                                            <td> {{ Form::text('position', null, [ 'class' => 'form-control position form-control-sm', ])}}</td>
                                             <span class="error text-danger">
                                                 {{$errors->first('position')}}
                                             </span>
                                            </tr>
                                        </table>
                                       </div>
                                       <div class="col-md-6">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">BRANCH</td>
                                                <td> {{ Form::text('branch', null, [ 'class' => 'form-control branch form-control-sm'])}}</td>
                                             <span class="error text-danger">
                                                 {{$errors->first('branch')}}
                                             </span>
                                            </tr>
                                        </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                         <table class="tbl-purchas-header ">
                                         <tr>
                                            <td class="meta-head">CHAT</td>
                                            <td>{{ Form::text('chat', null, [ 'class' => 'form-control chat form-control-sm'])}}</td>
                                             <span class="error text-danger">
                                                 {{$errors->first('chat')}}
                                             </span>
                                            </tr>
                                        </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                         <table class="tbl-purchas-header ">
                                         <tr>
                                            <td class="meta-head">SKYE</td>
                                            <td> {{ Form::text('skype', null, [ 'class' => 'form-control skype form-control-sm' ])}}</td>
                                             <span class="error text-danger">
                                                 {{$errors->first('skype')}}
                                             </span>
                                            </span>
                                        </tr>
                                    </table>
                                   </div>
                                </div>
                            </div>
                                   <div class="modal-footer d-flex justify-content">
                                       {{ Form::submit('Save',[ 'class' => 'btn btn-danger btn-sm' ]) }}
                                       <button class="btn btn-light btn-sm" data-dismiss="modal">Cancel</a>
                                   </div>
                                  {{ Form::close() }}
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

                        <div class="saler-data table-responsive active">
                        
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header ">
                                  <h3 class="modal-title w-100 font-weight-bold">Edit Saler</h3>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                               <div class="modal-body ">
                                                           
                                    {{Form::open([  'url' => '/update-saler', 'method' => 'post','class' => 'form saler-form'])}}
                        
                                    <div class="row">
                                        <div class="col-md-4 ">
                                         <table class="tbl-purchas-header w-auto">
                                         <tr>
                                         <td class="meta-head">SURNAME</td>
                                         <td>{{ Form::text('surname', null, [ 'class' => 'form-control surname-edit form-control-sm', 'placeholder' => 'Surname', 'required','id'=>'surname-edit'])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('surname')}}
                                            </span>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4 ">
                                    <table class="tbl-purchas-header w-auto">
                                    <tr>
                                       <td class="meta-head">NAME</td>
                                       <td> {{ Form::text('name', null, ['class' => 'form-control name-edit form-control-sm','placeholder' => 'Name','required','id'=>'name-edit'])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('name')}}
                                            </span>
                                        </tr>
                                    </table>
                                   </div>
                                   <div class="col-md-4">
                                    <table class="tbl-purchas-header">
                                        <tr>
                                            <td class="meta-head">NICK NAME</td>
                                            <td>{{ Form::text('nick_name', null, ['class' => 'form-control nick_name-edit form-control-sm', 'id' => 'nick_name-edit' ])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('nick_name')}}
                                            </span>
                                        </tr>
                                    </table>
                                   </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 ">
                                     <table class="tbl-purchas-header ">
                                     <tr>
                                        <td class="meta-head">E-MAIL</td>
                                        <td>{{ Form::text('email', null, ['class' => 'form-control email-edit form-control-sm','required','id' => 'email-edit' ])}}</td>
                                       <span class="error text-danger">
                                           {{$errors->first('email')}}
                                       </span>
                                    </tr>
                                </table>
                               </div>
                               <div class="col-md-6">
                                <table class="tbl-purchas-header ">
                                    <tr>
                                        <td class="meta-head">MOBILE</td>
                                        <td> {{ Form::text('mobile', null, ['class' => 'form-control mobile-edit form-control-sm', 'autocomplete' => 'off','oninput' => 'checkMobile(this.value)', 'maxlength' => 10, 'required','id' => 'mobile-edit'])}}</td>
                                         <span class="error text-danger">
                                             {{$errors->first('mobile')}}
                                         </span>
                                        </tr>
                                    </table>
                                   </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">GENDER</td>
                                            <td>  {{ Form::select('gender',[1 => 'Male', 2 => 'Female'], null, ['class' => 'form-control gender-edit form-control-sm', 'required','id' =>'gender-edit'])}}</td>
                                             <span class="error text-danger">
                                                 {{$errors->first('gender')}}
                                             </span>
                                            </tr>
                                        </table>
                                       </div>
                                       <div class="col-md-6">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">BIRTH DATE</td>
                                                <td>{{ Form::text('date_of_birth', null, [ 'class' => 'form-control date_of_birth-edit form-control-sm','required', 'autocomplete' => 'off','id' => 'date_of_birth-edit' ])}}</td>
                                             <span class="error text-danger">
                                                 {{$errors->first('date_of_birth')}}
                                             </span>
                                            </tr>
                                        </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                         <table class="tbl-purchas-header ">
                                         <tr>
                                            <td class="meta-head">POSITION</td>
                                            <td> {{ Form::text('position', null, ['class' => 'form-control position-edit form-control-sm', 'id' => 'position-edit'])}}</td>
                                            <span class="error text-danger">
                                                 {{$errors->first('position')}}
                                             </span>
                                            </tr>
                                        </table>
                                       </div>
                                       <div class="col-md-6">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">BRANCH</td>
                                                <td> {{ Form::text('branch', null, ['class' => 'form-control branch-edit form-control-sm','id' => 'branch-edit'])}}</td>
                                              <span class="error text-danger">
                                                  {{$errors->first('branch')}}
                                              </span>
                                            </tr>
                                        </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                         <table class="tbl-purchas-header ">
                                         <tr>
                                            <td class="meta-head">CHAT</td>
                                            <td> {{ Form::text('chat', null, ['class' => 'form-control chat-edit form-control-sm', 'placeholder' => 'chat','id' => 'chat-edit'])}}</td>
                                             <span class="error text-danger">
                                                 {{$errors->first('chat')}}
                                             </span>
                                            </tr>
                                        </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                         <table class="tbl-purchas-header ">
                                         <tr>
                                            <td class="meta-head">SKYE</td>
                                            <td> {{ Form::text('skype', null, [ 'class' => 'form-control skype-edit form-control-sm', 'placeholder' => 'Skype','id' => 'skype-edit'])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('skype')}}
                                            </span>
                                        </tr>
                                    </table>
                                   </div>
                                </div>
                            </div>
                                    <div class="modal-footer d-flex justify-content">
                                        {{ Form::hidden('saler_id', null, ['class' => 'form-control','id'=>'saler_id'])}} 
                                            {{ Form::submit('Save',[ 'class' => 'btn btn-danger btn-sm']) }}
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
@endsection
@section('script')
<script type="text/javascript">
        var page = '';
        var search = '';
        var salerId = '';
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
                getSalerData(qstring);
            });
            $(document).on('click','.delete-saler',function(){
                salerId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getSalerData(qstring);
            });
        });

        $(document).on('dblclick', '#saler-table tbody tr', function(event) {
            var salerId = $(this).data('id');
            if(typeof(salerId) !== 'undefined'){
                var url = 'saler/'+salerId+'/edit';
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{URL::to('get-saler-data')}}",
                        type: "POST",
                        data: {salerId:salerId, "_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                            }).done(function(data) {
                            // if(data.salerData != null){
                                $('#saler_id').val(salerId);
                                $('#surname-edit').val(data.salerData.surname);
                                $('#name-edit').val(data.salerData.name);
                                $('#email-edit').val(data.salerData.email);
                                $('#nick_name-edit').val(data.salerData.nick_name);
                                $('#date_of_birth-edit').val(data.salerData.date_of_birth);
                                $('#gender-edit').val(data.salerData.gender);
                                $('#mobile-edit').val(data.salerData.mobile);
                                $('#position-edit').val(data.salerData.position);
                                $('#branch-edit').val(data.salerData.branch);
                                $('#chat-edit').val(data.salerData.chat);
                                $('#skype-edit').val(data.salerData.skype);
                               
                            // }
                    }).fail(function(error) {

                    });
                    $('#modalEditForm').modal('show');
            }
        });

        getSalerData(qstring);
        // get all expense data
        function getSalerData(qstring){
            $.ajax({
                url: "{{URL::to('saler')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.saler-data').html(data);

            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this expense!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removeSaler();
                swal("Deleted!", "Your expense has been deleted.", "success");
            });
        }
        // remove expense
        function removeSaler(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-saler')}}"+'/'+salerId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }       
            }).done(function(data) {
                getSalerData(qstring);
            }).fail(function() {

            });
        }
        $('.date_of_birth').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('.date_of_birth-edit').datepicker({
        format: 'dd-mm-yyyy'
    });
  
        function checkOtherMobile(value) {
        $('.other_mobile').val(validMobileNumber(value));
    }
    function checkMobile(value) {
        $('.mobile').val(validMobileNumber(value));
    }
    function validMobileNumber(value) {
        if (/[a-zA-Z!@#$&()\\`.+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
            return value.substring(0, (value.length - 1));
        } else {
            return value;
        }   
    }
    </script>
    @endsection
