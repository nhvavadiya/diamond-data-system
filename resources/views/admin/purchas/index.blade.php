@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Purchas</strong>
                        </h3>
                    </div>
                    
                  
                </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        
                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                       <ul class="nav nav-tabs padding-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <span class="input-group-addon search-border">
                                                    <i class="zmdi zmdi-search"></i>
                                                </span>
                                              
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <a href="{{URL::to('/add-purchas')}}"class="btn btn-primary btn-sm float-right">Add</a>
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
        
                                <div class="purchas-data table-responsive active">
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
        var purchasId = '';
        var payment_method = '';
        var fromdate = moment(new Date()).format('YYYY-MM-DD');
        var todate = moment(new Date()).format('YYYY-MM-DD');
        var qstring = 'fromdate=' + fromdate + '&todate=' + todate;

        $(document).ready(function(){

       //  $('.daterange').daterangepicker({
       //      locale: {
       //          direction: 'drop-down-date-range',
       //          cancelLabel: 'Clear',
       //          format: 'D/M/Y'
       //      }
       //  });
       //  $('.daterange').on('apply.daterangepicker', function(ev, picker) {

       //      fromdate = picker.startDate.format('YYYY-MM-DD');
       //      todate = picker.endDate.format('YYYY-MM-DD');
       //      qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
       //      getPurchasData(qstring);
       //  });
       //  $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
       //      $(".daterange").val('');
       //      fromdate = '';
       //      todate = '';
       //      qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
       //      getPurchasData(qstring);
       //  });

          
       getPurchasData(qstring);
            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
                getPurchasData(qstring);
            });
            $(document).on('click','.delete-purchas',function(){
                purchasId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
                getPurchasData(qstring);
            });
         
        });
        $(document).on('click', '#purchas-table tbody tr', function(event) {
            var purchasId = $(this).data('id');
            if(typeof(purchasId) !== 'undefined'){
                $('#purchas-table tbody tr').removeClass('selected-tr');
                $(this).addClass('selected-tr');
            }
        });

        $(document).on('dblclick', '#purchas-table tbody tr', function(event) {
            var purchasId = $(this).data('id');
            if(typeof(purchasId) !== 'undefined'){
                var url = 'purchas/'+purchasId+'/edit';
              window.location.href = url;
            }
        });
        getPurchasData(qstring);

        // get all invoice data
        function getPurchasData(qstring){

            $.ajax({
                url: "{{URL::to('purchas')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.purchas-data').html(data);

            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this invoice!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removePurchas();
                swal("Deleted!", "Your purchas has been deleted.", "success");
            });
        }
        // remove expense
        function removePurchas(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-purchas')}}"+'/'+purchasId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getPurchasData(qstring);
            }).fail(function() {

            });
        }





    </script>
@stop
