@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Gia</strong>
                        </h3>
                     
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
                                        <a href="{{URL::to('/add-gia')}}"class="btn btn-primary btn-sm float-right ">Add</a>

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
    
                            <div class="gia-data table-responsive active">
                        
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
            $(document).on('click','.delete-gia',function(){
                giaId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getGiaData(qstring);
            });
        });
        $(document).on('dblclick', '#gia-table tbody tr', function(event) {
            var giaId = $(this).data('id');
            if(typeof(giaId) !== 'undefined'){
                var url = 'gia/'+giaId+'/edit';
                window.location.href = url;
               
            }
        });

        getGiaData(qstring);
        // get all gia data
        function getGiaData(qstring){
            $.ajax({
                url: "{{URL::to('gia')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.gia-data').html(data);

            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this gia!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removeGia();
                swal("Deleted!", "Your gia has been deleted.", "success");
            });
        }
        // remove expense
        function removeGia(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-gia')}}"+'/'+giaId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getGiaData(qstring);
            }).fail(function() {

            });
        }
      
    </script>
    @endsection
                 