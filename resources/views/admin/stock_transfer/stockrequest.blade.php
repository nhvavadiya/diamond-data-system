@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Stock Transfer Request</strong>
                        </h3>
                     
                    </div>
               
                    </div>
                    <div class="body">
                    <!-- Nav tabs -->
                    
                        <div class="col-md-12">
                            <div class="row">
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
                                    <a href="{{URL::to('/stock-transfer')}}"class="btn btn-primary btn-sm float-right">Back</a>
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
    
                            <div class="stockRequest-data table-responsive active">
                        
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
        var stockRequestId = '';
 
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
           //     getCustomerData(qstring);
           // });
           // $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
           //     $(".daterange").val('');
           //     fromdate = '';
           //     todate = '';
           //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
           //     getCustomerData(qstring);
           // });
            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getStockRequestData(qstring);
            });
            $(document).on('click','.delete-stockRequest',function(){
                stockRequestId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getStockRequestData(qstring);
            });
        });

        getStockRequestData(qstring);
        // get all gia data
        function getStockRequestData(qstring){
            $.ajax({
                url: "{{URL::to('view-stock-transfer')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.stockRequest-data').html(data);

            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this stock request!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removeStockRequest();
                swal("Deleted!", "Your nogia has been deleted.", "success");
            });
        }
        function removeStockRequest()
        {
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-stockrequest')}}"+'/'+stockRequestId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getStockRequestData(qstring);
            }).fail(function() {

            });
        }
    </script>
    @endsection
                 