@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Branch</strong>
                        </h3>
                    </div>
                    <div class="col-md-12 mt-4">
                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modalAddBranch">Add</button>
                    </div>
                    <div class="modal fade bd-example-modal-lg" id="modalAddBranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="width: 38%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title w-100 font-weight-bold">Add Branch</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-1">
                                    {{Form::open(['url' => '/store-branch','method' => 'post','autocomplete' => 'off','class' => 'form broker-form' ])}} 
                                    <div class="row">
                                        {{ Form::label('name', 'Name ',['class' => 'col-md-2 col-form-label']) }}
                                        <div class = "col-md-8">
                                            {{ Form::text('name', null, [
                                                'class' => 'form-control name',
                                                'placeholder' => 'Name',
                                            ])}}
                                        </div>
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
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
                           
                            @if(Session::has('msg'))
                                <div class="alert alert-success notification">
                                    <strong>Success!</strong> {{Session::get('msg')}}
                                </div>
                            @endif
                            <div class="tab-content">
                                <div class="table-responsive active">  
                                    <table class="table m-b-0 table-hover" id="branch-table">
                                        <thead>
                                            <tr>
                                                <th>Sr. no</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; ?>
                                            @forelse($branch as $row)
                                            <tr data-id="{{encrypt($row->id)}}">
                                                <td>{{$i++}}</td>
                                            
                                                    <td style="cursor: pointer;">{{ $row->name }}</td>
                                                
                                                    <td>
                                                        @if(Auth::user()->role == 1)
                                                        <a href="#" class="delete-branch a-color" data-id="{{($row->id)}}">
                                                            <i class="ti-trash text-danger"></i>
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="11" class="text-center">No records available</td>
                                            @endforelse
                                        </tbody>
                                    </table>
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
    var branchId = '';

    var fromdate = moment(new Date()).format('YYYY-MM-DD');
    var todate = moment(new Date()).format('YYYY-MM-DD');
    var qstring = 'fromdate=' + fromdate + '&todate=' + todate;

    $(document).ready(function(){
        
       
        $(document).on('click', '.pagination a',function(event){
            event.preventDefault();
            page=$(this).attr('href').split('page=')[1];
            qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
            getBranchData(qstring);
        });
        $(document).on('click','.delete-branch',function(){
            branchId = $(this).data('id');
            showConfirmMessage();
        });
        $(document).on('keyup','.search',function(){
            search = $(this).val();
            qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
            getBranchData(qstring);
        });
    });
    $(document).on('dblclick', '#branch-table tbody tr', function(event) {
        var branchId = $(this).data('id');
        if(typeof(branchId) !== 'undefined'){
            var url = 'branch/'+branchId+'/edit';
            window.location.href = url;
           
        }
    });

    getBranchData(qstring);
    // get all gia data
    function getBranchData(qstring){
        $.ajax({
            url: "{{URL::to('branch')}}?"+qstring,
            dataType: 'json',
        }).done(function(data) {
            $('.branch-data').html(data);

        }).fail(function() {

        });
    }
    function showConfirmMessage() {
        swal({
            title: "Are you sure?",
            text: "You want to delete this branch!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            removeBranch();
            swal("Deleted!", "Your gia has been deleted.", "success");
        });
    }
    // remove expense
    function removeBranch(){
        $.ajax({
            type: "DELETE",
            url: "{{URL::to('delete-branch')}}"+'/'+branchId,
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}"
            }
        }).done(function(data) {
            getBranchData(qstring);
        }).fail(function() {

        });
    }
  
</script>
@endsection