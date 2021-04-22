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
                            <strong>Stock Transfer</strong>
                        </h3>
                     
                    </div>
               
                    
                 
                    </div>
                    <div class="body">
                    <!-- Nav tabs -->
                    
                        <div class="col-md-12">
                            <div class="row  mt-3">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                   <ul class="nav nav-tabs padding-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <span class="input-group-addon search-border">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </div>
                                    </ul>
                                </div>
                                <div class="col-lg-9 col-md-6 col-sm-6">
                                <a href="{{URL::to('/view-stock-transfer')}}"class="btn btn-primary btn-sm  float-right">View Request</a>
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
    
                            <div class="stock-data table-responsive active">
                        
                            </div>
                        </div>
                        <div class="modal fade bd-example-modal-lg" id="modalStockTransferForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document" style="width: 38%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100 font-weight-bold">Add Stock Transfer Request</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {{Form::open(['url' => '/add-stock-transfer','method' => 'post','autocomplete' => 'off','class' => 'form stock-transfer-form' ])}} 
                                    <div class="modal-body mx-1">
                                        {{ Form::hidden('gia_id', null, ['class' => 'form-control gia_id', 'required','id' => 'gia_id'])}}
                                        
                                        <div class="row">
                                            <label for="stock" class="col-md-3 col-form-label">Stock<span> </span></label>
                                            <div class="col-md-7">
                                                {{ Form::text('stock', null, ['class' => 'form-control stock','placeholder' => 'stock', 'required','id' => 'stock'])}}
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <label for="send_to" class="col-md-3 col-form-label">Send To<span> </span></label>
                                            <div class="col-md-7">
                                                <!-- {{ Form::text('send_to', null, ['class' => 'form-control send_to','placeholder' => 'send_to', 'required','id' => 'send_to'])}} -->
                                                <select name="send_to" class="form-control send_to" id="send_to" required>
                                                    @foreach ($country as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify">
                                        <button class="btn btn-danger btn-sm">submit</button>
                                        <button class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
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
        var giaId = '';
 
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
                getGiaData(qstring);
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getGiaData(qstring);
            });
        });
        getGiaData(qstring);
        // get all gia data
        function getGiaData(qstring){
            $.ajax({
                url: "{{URL::to('stock-transfer')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.stock-data').html(data);

            }).fail(function() {

            });
        }
        $(document).on('click','.btnStockRequest',function(){
                var stockgiaId = $(this).attr('id');
                $('#gia_id').val(stockgiaId);
            });
      
    </script>
    @endsection
                 