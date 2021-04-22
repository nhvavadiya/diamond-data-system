@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Memo</strong>
                        </h3>
                    </div>
                    <div class="col-md-12 mt-3">
                        <a href="{{URL::to('/add-memo')}}"class="btn btn-primary btn-sm ">Add</a>
                    </div>
                    </div>
                    <div class="body">
                    <!-- Nav tabs -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                   <!-- <ul class="nav nav-tabs padding-0"> -->
                                        <div class="input-group">
                                            {{-- <input type="text" class="form-control search" placeholder="Search..."> --}}
                                            {{-- <span class="input-group-addon search-border">
                                                <i class="zmdi zmdi-search"></i>
                                            </span> --}}
                                          
                                        </div>
                                    <!-- </ul> -->
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
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
                            <div class="memo-data table-responsive active">
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
        var memoId = '';
        var payment_method = '';
        var fromdate = moment(new Date()).format('YYYY-MM-DD');
        var todate = moment(new Date()).format('YYYY-MM-DD');
        var qstring = 'fromdate=' + fromdate + '&todate=' + todate;

        $(document).ready(function(){
            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
                getmemoData(qstring);
            });
            $(document).on('click','.delete-memo',function(){
                memoId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate + '&payment_method='+payment_method;
                getmemoData(qstring);
            });
        });
    
        $(document).on('dblclick', '#memo-table tbody tr', function(event) {
            var memoId = $(this).data('id');
            if(typeof(memoId) !== 'undefined'){
                var url = 'memo/'+memoId+'/edit';
                window.location.href = url;
            
            }
        });

        getmemoData(qstring);
        // get all expense data
        function getmemoData(qstring){
            $.ajax({
                url: "{{URL::to('memo')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.memo-data').html(data);

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
                removeMemo();
                swal("Deleted!", "Your expense has been deleted.", "success");
            });
        }
        // remove expense
        function removeMemo(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-memo')}}"+'/'+memoId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getmemoData(qstring);
            }).fail(function() {

            });
        }
    </script>
@stop
