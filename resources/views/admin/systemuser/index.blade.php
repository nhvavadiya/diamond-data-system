@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>User</strong>
                        </h3>
                    </div>
                    <a href="{{URL::to('/add-users')}}"class="btn btn-primary m-4 btn-sm  ">Add</a>
                    </div>
                    <div class="body">
                    <!-- Nav tabs -->
                           
                            @if(Session::has('msg'))
                                <div class="alert alert-success notification">
                                    <strong>Success!</strong> {{Session::get('msg')}}
                                </div>
                            @endif  
                                <table class="table m-b-0 table-hover" id="users-table">
                                    <thead>
                                        <tr>
                                            <th>Sr. no</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @forelse($users as $row)
                                        <tr data-id="{{encrypt($row->id)}}">
                                            <td>{{$i++}}</td>
                                            <td style="cursor: pointer;">{{ $row->email}}</td>
                                                <td style="cursor: pointer;">{{ $row->name }}</td>
                                                <td style="cursor: pointer;">{{ $row->country->country_name }}</td>
                                                <td>
                                                    @if(Auth::user()->role == 1)
                                                    <a href="#" class="delete-users a-color" data-id="{{($row->id)}}">
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
@endsection
@section('script')
<script type="text/javascript">
        var page = '';
        var search = '';
        var usersId = '';
 
        var fromdate = moment(new Date()).format('YYYY-MM-DD');
        var todate = moment(new Date()).format('YYYY-MM-DD');
        var qstring = 'fromdate=' + fromdate + '&todate=' + todate;

        $(document).ready(function(){
            
           
            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getUsersData(qstring);
            });
            $(document).on('click','.delete-users',function(){
                usersId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getUsersData(qstring);
            });
        });
        $(document).on('dblclick', '#users-table tbody tr', function(event) {
            var usersId = $(this).data('id');
            if(typeof(usersId) !== 'undefined'){
                var url = 'users/'+usersId+'/edit';
                window.location.href = url;
               
            }
        });

        getUsersData(qstring);
        // get all gia data
        function getUsersData(qstring){
            $.ajax({
                url: "{{URL::to('users')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.users-data').html(data);

            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this users!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removeUsers();
                swal("Deleted!", "Your gia has been deleted.", "success");
            });
        }
        // remove expense
        function removeUsers(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-users')}}"+'/'+usersId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getUsersData(qstring);
            }).fail(function() {

            });
        }
      
    </script>
    @endsection


                 