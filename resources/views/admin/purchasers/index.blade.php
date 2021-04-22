@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Purchaser</strong>
                        </h3>
                    </div>
                        <div class="modal fade bd-example-modal-md" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-md w-auto" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title w-100 font-weight-bold">Add Purchaser </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                             <div class="modal-body  ">
                              {{Form::open([  'url' => '/store-purchaser', 'method' => 'post','autocomplete' => 'off','class' => 'form purchaser-form' ])}}

                              
                               <div class="row">
                                   <div class="col-md-6 ">
                                    <table class="tbl-purchas-header ">
                                    <tr>
                                    <td class="meta-head w-auto">SURNAME</td>
                                      <td>  {{ Form::text('surname', null, [ 'class' => 'form-control surname form-control-sm','required'  ])}}</td> 
                                         <span class="error text-danger">
                                          {{$errors->first('surname')}}
                                        </span>
                                    </tr>
                                    </table>
                                </div>
                                    <div class="col-md-6 ">
                                     <table class="tbl-purchas-header">
                                     <tr>
                                        <td class="meta-head w-auto">NAME</td>
                                        <td> {{ Form::text('name', null, ['class' => 'form-control name form-control-sm', 'required' ])}}  </td>
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
                                            <td class="meta-head w-auto">NICK NAME</td>
                                            <td> {{ Form::text('nick_name', null, ['class' => 'form-control nick_name form-control-sm','maxlength' => 50 ])}}  </td>
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
                                        <td> {{ Form::text('email', null, [ 'class' => 'form-control email form-control-sm','required'])}}</td> 
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
                                            <td>{{ Form::text('mobile', null, ['class' => 'form-control mobile form-control-sm','autocomplete' => 'off','oninput' => 'checkMobile(this.value)','maxlength' => 10, 'required'])}}</td>
                                            <span class="error text-danger">
                                               {{$errors->first('mobile')}}
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
                                        <td>{{ Form::text('position', null, [ 'class' => 'form-control position form-control-sm','maxlength' => 50])}}  </td>
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
                                            <td>{{ Form::text('branch', null, [ 'class' => 'form-control branch form-control-sm'])}}  </td>
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
                                            <td>{{ Form::text('chat', null, ['class' => 'form-control chat form-control-sm'])}}  </td>
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
                                        <td>{{ Form::text('skype', null, ['class' => 'form-control skype form-control-sm'])}} </td>
                                            <span class="error text-danger">
                                               {{$errors->first('skype')}}
                                            </span>
                                        </tr>
                                    </table>
                                   </div>
                                </div>
                            </div>
                              <div class="modal-footer d-flex justify-content">
                                <button class="btn btn-danger btn-sm">submit</button>
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
                                            <input type="text" class="form-control search" placeholder="Search">
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

                        <div class="purchaser-data table-responsive active">

                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-md" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title w-100 font-weight-bold">Edit Purchaser </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                             <div class="modal-body mx-1">
                              {{Form::open([  'url' => '/update-purchaser', 'method' => 'post','class' => 'form purchaser-form' ])}}

                              <div class="row">
                                <div class="col-md-4 ">
                                 <table class="tbl-purchas-header w-auto">
                                 <tr>
                                 <td class="meta-head">SURNAME</td>
                                      <td>{{ Form::text('surname', null, [ 'class' => 'form-control surname-edit  form-control-sm','placeholder' => 'Surname', 'required', 'id'=>'surname-edit'  ])}}</td>   
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
                                   <td>{{ Form::text('name', null, ['class' => 'form-control name-edit  form-control-sm', 'placeholder' => 'Name','required','id'=>'name-edit'])}} </td>
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
                                            <td>{{ Form::text('nick_name', null, ['class' => 'form-control nick_name-edit  form-control-sm','placeholder' => 'Nick Name','maxlength' => 50,'id'=>'nick_name-edit' ])}} </td>
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
                                         <td>{{ Form::text('email', null, [ 'class' => 'form-control email-edit  form-control-sm','placeholder' => 'Email', 'required','id'=>'email-edit'])}} </td>
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
                                         <td>{{ Form::text('mobile', null, ['class' => 'form-control mobile-edit  form-control-sm','placeholder' => 'Mobile','autocomplete' => 'off','oninput' => 'checkMobile(this.value)','maxlength' => 10, 'required','id'=>'mobile-edit'])}}</td>
                                         <span class="error text-danger">
                                            {{$errors->first('mobile')}}
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
                                        <td> {{ Form::text('position', null, [ 'class' => 'form-control position-edit  form-control-sm','placeholder' => 'Position','maxlength' => 50,'id'=>'position-edit'])}}  </td>
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
                                            <td> {{ Form::text('branch', null, [ 'class' => 'form-control branch-edit  form-control-sm','placeholder' => 'Branch','id'=>'branch-edit'])}} </td>
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
                                        <td> {{ Form::text('chat', null, ['class' => 'form-control chat-edit  form-control-sm','placeholder' => 'chat','id'=>'chat-edit'])}} </td>
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
                                    <td> {{ Form::text('skype', null, ['class' => 'form-control skype-edit  form-control-sm','placeholder' => 'Skype','id'=>'skype-edit'])}} </td>
                                         <span class="error text-danger">
                                          {{$errors->first('skype')}}
                                        </span>
                                    </tr>
                                </table>
                               </div>
                            </div>
                      
                            </div>
                              <div class="modal-footer d-flex justify-content">
                                {{ Form::hidden('purchaser_id', null, ['class' => 'form-control','id'=>'purchaser_id'])}}
                                <button class="btn btn-danger btn-sm">submit</button>
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
        var purchaserId = '';
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
          //     getPurchaserData(qstring);
          // });
          // $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
          //     $(".daterange").val('');
          //     fromdate = '';
          //     todate = '';
          //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
          //     getPurchaserData(qstring);
          // });
            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getPurchaserData(qstring);
            });
            $(document).on('click','.delete-purchaser',function(){
                purchaserId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getPurchaserData(qstring);
            });
        });
        $(document).on('dblclick', '#purchaser-table tbody tr', function(event) {
            var purchaserId = $(this).data('id');
            if(typeof(purchaserId) !== 'undefined'){
                var url = 'purchaser/'+purchaserId+'/edit';
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{URL::to('get-purchase-data')}}",
                        type: "POST",
                        data: {purchaserId:purchaserId, "_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                            }).done(function(data) {
                            // if(data.purchaserData != null){
                                $('#purchaser_id').val(purchaserId);
                                $('#surname-edit').val(data.purchaserData.surname);
                                $('#name-edit').val(data.purchaserData.name);
                                $('#email-edit').val(data.purchaserData.email);
                                $('#nick_name-edit').val(data.purchaserData.nick_name);
                                $('#mobile-edit').val(data.purchaserData.mobile);
                                $('#position-edit').val(data.purchaserData.position);
                                $('#branch-edit').val(data.purchaserData.branch);
                                $('#chat-edit').val(data.purchaserData.chat);
                                $('#skype-edit').val(data.purchaserData.skype);
                            // }
                    }).fail(function(error) {

                    });
                    $('#modalEditForm').modal('show');
            }
        });

        getPurchaserData(qstring);
        // get all expense data
        function getPurchaserData(qstring){
            $.ajax({
                url: "{{URL::to('purchaser')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.purchaser-data').html(data);

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
                removePurchaser();
                swal("Deleted!", "Your expense has been deleted.", "success");
            });
        }

        // remove expense
        function removePurchaser(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-purchaser')}}"+'/'+purchaserId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getPurchaserData(qstring);
            }).fail(function() {

            });
        }

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
