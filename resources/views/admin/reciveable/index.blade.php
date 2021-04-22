@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Reciveable</strong>
                        </h3>
                    </div>
                    
                    <div class="modal fade bd-example-modal-lg" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title w-100 font-weight-bold">Add Reciveable </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                             <div class="modal-body mx-1">
                              {{Form::open([  'url' => '/store-reciveable', 'method' => 'post','autocomplete' => 'off','class' => 'form reciveable-form' ])}}
                                
                              <input  value="1" name="type" class="type d-none" required/>
                               <div class="row">
                                    <div class="col-md-12 ">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">DATE</td>
                                                 <td> {{Form::text('date',\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y'),['class'=>'form-control  date','required'])}}</td>
                                                 <span class="error text-danger">
                                                  {{$errors->first('date')}}
                                                </span>
                                           </tr>
                                       </table>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-12 ">
                                        <table class="tbl-purchas-header">
                                            <tr>
                                                <td class="meta-head">INVOICE ID</td>
                                                <td>{{ Form::text('invoice_id', null, [ 'class' => 'form-control invoice_id', 'required'])}}</td>
                                                 <span class="error text-danger">
                                                  {{$errors->first('invoice_id')}}
                                                </span>
                                            </tr>
                                       </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">NOTE</td>
                                                <td>{{Form::textarea('note','',['class'=>'form-control no-resize remark','rows'=>'2'])}}</td>
                                                <span class="error text-danger">
                                                    {{$errors->first('note')}}
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
                      @if(in_array(Auth::user()->role, [1,2]))
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
                                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalRegisterForm">Add</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Tab panes -->
                    <div class="tab-content m-t-10">

                        <!-- notification -->
                        @if(Session::has('msg'))
                            <div class="alert alert-success notification">
                                <strong>Success!</strong> {{Session::get('msg')}}
                               
                            </div>
                        @endif

                        <div class="reciveable-data table-responsive active">
                        
                        </div>
                    </div>

                <!--edit--->

                <div class="modal fade bd-example-modal-lg" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title w-100 font-weight-bold">Edit Reciveable </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                             <div class="modal-body mx-1">
                              {{Form::open([  'url' => '/update-reciveable', 'method' => 'post','class' => 'form reciveable-form' ])}}
                              {{ Form::hidden('reciveable_id', null, ['class' => 'form-control','id'=>'reciveable_id'])}}
                               
                              <div class="row">
                                <div class="col-md-12 ">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">DATE</td>
                                            <td>{{Form::text('date',\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y'),['class'=>'form-control  date-edit','placeholder'=>'Date','required','id' => ' date-edit'])}} </td>
                                         <span class="error text-danger">
                                          {{$errors->first('date')}}
                                        </span>
                                    </tr>
                                </table>
                             </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12 ">
                                 <table class="tbl-purchas-header">
                                     <tr>
                                         <td class="meta-head">INVOICE ID</td>
                                         <td>{{ Form::text('invoice_id', null, [ 'class' => 'form-control invoice_id-edit', 'placeholder' => 'invoice_id',   'required','id' => ' invoice_id-edit'])}}  </td>
                                          <span class="error text-danger">
                                           {{$errors->first('invoice_id')}}
                                        </tr>
                                    </table>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12 ">
                                     <table class="tbl-purchas-header ">
                                         <tr>
                                             <td class="meta-head">NOTE</td>
                                             <td>{{Form::textarea('note',null,['class'=>'form-control no-resize remark-edit','placeholder'=>'Notes','rows'=>'2','id' => ' note-edit'])}}  </td>
                                             <span class="error text-danger"></span>
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
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
    <script type="text/javascript">
        var page = '';
        var search = '';
        var reciveableId = '';
        var payment_method = '';
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
         //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
         //     getReciveableData(qstring);
         // });
         // $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
         //     $(".daterange").val('');
         //     fromdate = '';
         //     todate = '';
         //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
         //     getReciveableData(qstring);
         // });

         // $('.date').change(function(){
         //     date = $('.date').val();
         //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
         //     getReciveableData(qstring);
         // });
            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
                getReciveableData(qstring);
            });
            $(document).on('click','.delete-reciveable',function(){
                reciveableId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
                getReciveableData(qstring);
            });
           
        });

        $(document).on('dblclick', '#reciveable-table tbody tr', function(event) {
            var reciveableId = $(this).data('id');
            if(typeof(reciveableId) !== 'undefined'){
                var url = 'reciveable/'+reciveableId+'/edit';
                $.ajax({
                        headers: {                              
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{URL::to('get-reciveable-data')}}",
                        type: "POST",
                        data: {reciveableId:reciveableId, "_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                            }).done(function(data) {
                            // if(data.reciveableData != null){
                              
                                $('#reciveable_id').val(reciveableId);
                                $('#date-edit').val(data.reciveableData.date);
                                $('#invoice_id-edit').val(data.reciveableData.invoice_id);
                                $('#note-edit').val(data.reciveableData.note);
                             

                                
                            // }
                    }).fail(function(error) {

                    });
                    $('#modalEditForm').modal('show');
            }
        });

        getReciveableData(qstring);
        // get all expense data
        function getReciveableData(qstring){
            $.ajax({
                url: "{{URL::to('reciveable')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.reciveable-data').html(data);

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
                removeReciveable();
                swal("Deleted!", "Your reciveable has been deleted.", "success");
            });
        }
        // remove expense
        function removeReciveable(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-reciveable')}}"+'/'+reciveableId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getReciveableData(qstring);
            }).fail(function() {

            });
        }
        $('.date').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('.date-edit').datepicker({
        format: 'dd-mm-yyyy'
    });

    </script>
@stop
