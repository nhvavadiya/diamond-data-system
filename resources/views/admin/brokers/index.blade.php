@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Broker</strong>
                        </h3>
                    </div>
                        
                        <div class="modal fade bd-example-modal-lg" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title w-100 font-weight-bold">Add Broker</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body mx-1">
                                 {{Form::open(['url' => '/store-broker','method' => 'post','autocomplete' => 'off','class' => 'form broker-form' ])}}
                                 <div class="row">
                                    <div class="col-md-6 ">
                                     <table class="tbl-purchas-header ">
                                     <tr>
                                        <td class="meta-head">SURNAME</td>
                                        <td> {{ Form::text('surname', null, ['class' => 'form-control surname','required'])}}</td>
                                        <span class="error text-danger">
                                            {{$errors->first('surname')}}
                                        </span>
                                        </tr>
                                    </table>
                                   </div>
                                   <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">NAME</td>
                                            <td> {{ Form::text('name', null, ['class' => 'form-control name', 'required'])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('name')}}
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
                                        <td> {{ Form::text('email', null, ['class' => 'form-control email','required'])}}</td>
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
                                        <td>{{ Form::text('mobile', null, [ 'class' => 'form-control mobile','autocomplete' => 'off','oninput' => 'checkMobile(this.value)', 'maxlength' => 10,'required' ])}}</td>
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
                                        <td>{{ Form::select('gender',[1 => 'Male', 2 => 'Female'], null, ['class' => 'form-control gender','placeholder' => 'Select Gender','required' ])}}</td>
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
                                         <td> {{ Form::text('date_of_birth', null, [ 'class' => 'form-control date_of_birth', 'required',  'autocomplete' => 'off'])}}</td>
                                          <span class="error text-danger">
                                            {{$errors->first('date_of_birth')}}
                                        </span>
                                       </tr>
                                   </table>
                                  </div>
                               </div>
                              
                                    <div class="row">
                                    <div class="col-md-12">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">ADDRESS</td>
                                                <td>  {{ Form::textarea('address', null, ['class' => 'form-control address','rows' => 3  ])}}</td>
                                        <span class="error text-danger">
                                            {{$errors->first('address')}}
                                        </span>
                                    </tr>
                                </table>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6">
                                         <table class="tbl-purchas-header ">
                                             <tr>
                                                 <td class="meta-head">OTHER MOBILE</td>
                                                 <td> {{ Form::text('other_mobile', null, [ 'class' => 'form-control other_mobile', 'autocomplete' => 'off','oninput' => 'checkOtherMobile(this.value)','maxlength' => 15,'minlength' => 10,])}}</td>
                                                 <span class="error text-danger">
                                                     {{$errors->first('other_mobile')}}
                                                 </span>
                                             </tr>
                                         </table>
                                     </div>
                                      <div class="col-md-6">
                                          <table class="tbl-purchas-header ">
                                              <tr>
                                                  <td class="meta-head">REFERENCE</td>
                                                  <td> {{ Form::text('reference', null, ['class' => 'form-control reference',])}}</td>
                                                  <span class="error text-danger">
                                                      {{$errors->first('reference')}}
                                                  </span>
                                             </tr>
                                         </table>
                                      </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">FAX</td>
                                                <td>{{ Form::text('fax', null, [ 'class' => 'form-control fax'])}}</td>
                                               <span class="error text-danger">
                                                {{$errors->first('reference')}}
                                                 </span>
                                            </tr>
                                       </table>
                                   </div>
                               </div> 
                          <div class="row">          
                               <div class="col-md-6">
                                   <table class="tbl-purchas-header ">
                                       <tr>
                                            <td class="meta-head">CHAT</td>
                                              <td>{{ Form::text('chat', null, ['class' => 'form-control chat' ])}}</td>
                                              <span class="error text-danger">
                                              {{$errors->first('chat')}}
                                            </span>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">SKYE</td>
                                            <td> {{ Form::text('skype', null, [ 'class' => 'form-control skype'])}}</td>
                                            <span class="error text-danger">
                                            {{$errors->first('skype')}}
                                           </span>
                                        </tr>
                                    </table>
                                </div>
                            </div> 
                    </div> 
                                   <div class="modal-footer d-flex justify">
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
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <span class="input-group-addon search-border">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                          
                                        </div>
                                    </ul>
                                 
                                </div>
                               
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <!--  <div class="input-group"><input type="text" class="form-control daterange" autocomplete="off" placeholder="Select Date">
                                    </div>-->
                                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalRegisterForm">Add</button>
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

                        <div class="broker-data table-responsive active">
                        
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title w-100 font-weight-bold">Edit Broker</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body mx-1">
                              {{Form::open(['url' => '/update-broker','method' => 'post','class' => 'form broker-form' ])}}
                             
                              <div class="row">
                                <div class="col-md-6 ">
                                 <table class="tbl-purchas-header ">
                                 <tr>
                                    <td class="meta-head">SURNAME</td>
                                     <td> {{ Form::text('surname', null, ['class' => 'form-control surname-edit', 'placeholder' => 'Surname','required','id' => 'surname-edit'])}}</td>
                                      <span class="error text-danger">
                                        {{$errors->first('surname')}}
                                    </span>
                                    </tr>
                                </table>
                               </div>
                               <div class="col-md-6">
                                <table class="tbl-purchas-header ">
                                    <tr>
                                        <td class="meta-head">NAME</td>
                                        <td> {{ Form::text('name', null, ['class' => 'form-control name-edit','placeholder' => 'Name', 'required','id' => 'name-edit'])}}</td>
                                      <span class="error text-danger">
                                        {{$errors->first('name')}}
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
                                             <td>{{ Form::text('email', null, ['class' => 'form-control email-edit','placeholder' => 'Email','required','id' => 'email-edit'])}}</td>
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
                                             <td> {{ Form::text('mobile', null, [ 'class' => 'form-control mobile-edit','placeholder' => 'Mobile','autocomplete' => 'off','oninput' => 'checkMobile(this.value)', 'maxlength' => 10,'required' ,'id' => 'mobile-edit'])}}</td>
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
                                                <td>{{ Form::select('gender',[1 => 'Male', 2 => 'Female'], null, ['class' => 'form-control gender-edit', 'placeholder' => 'Select Gender', 'required','id' =>'gender-edit' ])}}</td>
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
                                               <td>    {{ Form::text('date_of_birth', null, [ 'class' => 'form-control date_of_birth-edit','placeholder' => 'Date of Birth','required', 'autocomplete' => 'off','id' => 'date_of_birth-edit' ])}}</td>
                                              <span class="error text-danger">
                                               {{$errors->first('date_of_birth')}}
                                              </span>
                                           </tr>
                                       </table>
                                   </div>
                                </div>
                                   <div class="row">
                                       <div class="col-md-12">
                                          <table class="tbl-purchas-header ">
                                              <tr>
                                                   <td class="meta-head">ADDRESS</td>
                                                   <td> {{ Form::textarea('address', null, ['class' => 'form-control address-edit', 'placeholder' => 'Address','rows' => 3 , 'required' ,'id' => 'address-edit'])}}</td>
                                                   <span class="error text-danger">
                                                       {{$errors->first('address')}}
                                                   </span>
                                               </tr>
                                           </table>
                                       </div>
                                   </div>
                                        <div class="row">
                                             <div class="col-md-6">
                                                 <table class="tbl-purchas-header ">
                                                     <tr>
                                                         <td class="meta-head">OTHER MOBILE</td> 
                                                         <td> {{ Form::text('other_mobile', null, [ 'class' => 'form-control other_mobile-edit', 'placeholder' => 'Other Mobile','autocomplete' => 'off','oninput' => 'checkOtherMobile(this.value)','maxlength' => 15,'minlength' => 10, 'id' => 'other_mobile-edit'])}}</td>
                                                           <span class="error text-danger">
                                                            {{$errors->first('other_mobile')}}
                                                        </span>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="tbl-purchas-header ">
                                                  <tr>
                                                      <td class="meta-head">REFERENCE</td>
                                                      <td> {{ Form::text('reference', null, ['class' => 'form-control reference-edit', 'placeholder' => 'Reference','id' => 'reference-edit'])}}</td>
                                                       <span class="error text-danger">
                                                        {{$errors->first('reference')}}
                                                      </span>
                                                     </tr>
                                                </table>
                                            </div>
                                        </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <table class="tbl-purchas-header ">
                                              <tr>
                                                  <td class="meta-head">FAX</td>
                                                  <td> {{ Form::text('fax', null, [ 'class' => 'form-control fax-edit','placeholder' => 'Fax' ,'id' => 'fax-edit'])}}</td>
                                    <span class="error text-danger">
                                        {{$errors->first('reference')}}
                                         </span>
                                    </tr>
                               </table>
                           </div>
                       </div> 
                          <div class="row">          
                               <div class="col-md-6">
                                   <table class="tbl-purchas-header ">
                                       <tr>
                                            <td class="meta-head">CHAT</td>
                                            <td> {{ Form::text('chat', null, ['class' => 'form-control chat-edit','placeholder' => 'chat'  ,'id' => 'chat-edit'])}}</td>
                                             <span class="error text-danger">
                                                {{$errors->first('chat')}}
                                              </span>
                                          </tr>
                                      </table>
                                  </div>
                                  <div class="col-md-6">
                                      <table class="tbl-purchas-header ">
                                          <tr>
                                              <td class="meta-head">SKYE</td>
                                            <td> {{ Form::text('skype', null, [ 'class' => 'form-control skype-edit', 'placeholder' => 'Skype','id' => 'skype-edit'])}}</td>
                                             <span class="error text-danger">
                                                {{$errors->first('skype')}}
                                               </span>
                                            </tr>
                                        </table>
                                    </div>
                                </div> 
                          </div> 
                                <div class="modal-footer d-flex justify">
                                   {{ Form::hidden('broker_id', null, ['class' => 'form-control','id'=>'broker_id'])}}
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
</div>

@endsection
@section('script')

<script type="text/javascript">
        var page = '';
        var search = '';
        var brokerId = '';
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
          //     getBrokerData(qstring);
          // });
          // $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
          //     $(".daterange").val('');
          //     fromdate = '';
          //     todate = '';
          //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
          //     getBrokerData(qstring);
          // });
            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getBrokerData(qstring);
            });
            $(document).on('click','.delete-broker',function(){
                brokerId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getBrokerData(qstring);
            });
        });     
        $(document).on('dblclick', '#broker-table tbody tr', function(event) {
            var brokerId = $(this).data('id');
            if(typeof(brokerId) !== 'undefined'){
                var url = 'broker/'+brokerId+'/edit';
                $.ajax({
                        headers: {                              
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{URL::to('get-broker-data')}}",
                        type: "POST",
                        data: {brokerId:brokerId, "_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                            }).done(function(data) {
                            // if(data.purchaserData != null){
                                $('#broker_id').val(brokerId);
                                $('#surname-edit').val(data.brokerData.surname);
                                $('#name-edit').val(data.brokerData.name);
                                $('#email-edit').val(data.brokerData.email);
                                $('#date_of_birth-edit').val(data.brokerData.date_of_birth);
                                $('#gender-edit').val(data.brokerData.gender);
                                $('#reference-edit').val(data.brokerData.reference);
                                $('#address-edit').val(data.brokerData.address);
                                $('#mobile-edit').val(data.brokerData.mobile);
                                $('#other_mobile-edit').val(data.brokerData.other_mobile);
                                $('#fax-edit').val(data.brokerData.fax);
                                $('#chat-edit').val(data.brokerData.chat);
                                $('#skype-edit').val(data.brokerData.skype);
                            // }
                    }).fail(function(error) {

                    });
                    $('#modalEditForm').modal('show');
               
            }
        });

        getBrokerData(qstring);
        // get all expense data
        function getBrokerData(qstring){
            $.ajax({
                url: "{{URL::to('broker')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.broker-data').html(data);

            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this broker!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removeBroker();
                swal("Deleted!", "Your broker has been deleted.", "success");
            });
        }
        // remove expense
        function removeBroker(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-broker')}}"+'/'+brokerId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }  
            }).done(function(data) {
                getBrokerData(qstring);
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
