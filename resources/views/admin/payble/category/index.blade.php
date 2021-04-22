@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-10" >
                        <h3>
                            <strong>Category</strong>
                        </h3>
                    </div>
                    <a href="{{URL::to('/payble')}}"class="btn btn-primary btn-sm ml-4 mt-4 mb-4">back</a>
                    <button type="button" class="btn btn-primary btn-sm m-4" data-toggle="modal" data-target="#modalRegisterForm">Add</button>
                    <div class="modal fade bd-example-modal-md" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title w-100 font-weight-bold">Add Category</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body mx-1">
                                 {{Form::open(['url' => '/store-category','method' => 'post','autocomplete' => 'off','class' => 'form category-form' ])}}
                             
                                 <div class="row">
                                    <div class="col-md-12">
                                       <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">NAME</td>
                                               <td>{{ Form::text('name', null, ['class' => 'form-control name', 'placeholder' => 'name','required','id' => 'name'])}}</td>
                                                <span class="error text-danger">
                                                       {{$errors->first('name')}}
                                               </span>
                                            </tr>
                                        </table>
                                     </div>
                                </div>
                                <div class="row">
                                     <div class="col-md-12 ">
                                         <table class="tbl-purchas-header">
                                             <tr>
                                                 <td class="meta-head">STATUS</td>
                                                 <td>{{ Form::text('status', null, ['class' => 'form-control status','placeholder' => 'status', 'required','id' => 'status'])}}</td>
                                                 <span class="error text-danger">
                                                    
                                                </span>
                                            </tr>
                                        </table>
                                    </div>
                                </div>                    
                            </div>
                                   <div class="modal-footer d-flex justify">
                                     <button class="btn btn-danger btn-sm">submit</button>
                                     <a href="{{URL::to('/category')}}"class="btn btn-light btn-sm">Cancel</a>
                                   </div>
                                   {{ Form::close() }}
                             
                              </div>
                           </div>
                        </div>
                   </div>
                  
                 
               
                    <div class="body">
                    <!-- Nav tabs -->
                    
                        <div class="col-md-12">
                            <div class="row">
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
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                   <!--<div class="input-group"><input type="text" class="form-control daterange" autocomplete="off" placeholder="Select Date">
                                    </div>-->
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
    
                            <div class="category-data table-responsive active">
                        
                            </div>
                         </div>
                         <div class="modal fade bd-example-modal-md" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-md" role="document" >
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title w-100 font-weight-bold">Edit Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body mx-1">
                              {{Form::open(['url' => '/update-category','method' => 'post','class' => 'form category-form' ])}}
                              <div class="row">
                                <div class="col-md-12">
                                   <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">NAME</td>
                                        <td>{{ Form::text('name', null, ['class' => 'form-control name-edit', 'placeholder' => 'details','required','id' => 'name-edit'])}}</td>
                                        <span class="error text-danger">
                                                    
                                        </span>
                                    </tr>
                                </table>
                            </div>
                        </div>                    
                    </div>
                                   <div class="modal-footer d-flex justify">
                                      {{ Form::hidden('category_id', null, ['class' => 'form-control','id'=>'category_id'])}}
                                      <button class="btn btn-primary btn-sm">submit</button>
                                      <a href="{{URL::to('/category')}}"class="btn btn-light btn-sm">Cancel</a>
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
</div>
@endsection

@section('script')
<script type="text/javascript">
        var page = '';
        var search = '';
        var categoryId = '';
 
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
                getCategoryData(qstring);
            });
            $(document).on('click','.delete-category',function(){
                categoryId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getCategoryData(qstring);
            });
        });
        $(document).on('dblclick', '#category-table tbody tr', function(event) {
            var categoryId = $(this).data('id');
            if(typeof(categoryId) !== 'undefined'){
                var url = 'category/'+categoryId+'/edit';
               
                $.ajax({
                        headers: {                              
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{URL::to('get-category-data')}}",
                        type: "POST",
                        data: {categoryId:categoryId, "_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                            }).done(function(data) {
                            // if(data.purchaserData != null){
                               
                                $('#category_id').val(categoryId);
                                $('#name-edit').val(data.categoryData.name);
                              
                                
                            // }
                       
                    }).fail(function(error) {

                });
                $('#modalEditForm').modal('show');
               
            }
        });

        getCategoryData(qstring);
        // get all gia data
        function getCategoryData(qstring){
            $.ajax({
                url: "{{URL::to('category')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.category-data').html(data);

            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this category!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removeCategory();
                swal("Deleted!", "Your category has been deleted.", "success");
            });
        }
        // remove expense
        function removeCategory(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-category')}}"+'/'+categoryId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getCategoryData(qstring);
            }).fail(function() {

            });
        }
      
    </script>
    @endsection
                 
