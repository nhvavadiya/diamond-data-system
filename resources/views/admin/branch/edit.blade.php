@extends('templates.master')
@section('content')
<style>
    select.form-control{
    border: 1px solid #c9ccd7;
    height: 2.875rem;
}
</style>
<div class="col-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3>Edit Branch</h3>
            {{Form::open(['url'=>'branch/'.encrypt($branch->id),'method'=>'put','class'=>'form','files'=>'true'])}}
               
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Name ') }}
                            {{ Form::text('name', !empty($branch->name) ? $branch->name : null, [
                                'class' => 'form-control name',
                                'placeholder' => 'Name',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('name')}}
                        </span>
                    <div>
                </div>
                
             <button class="btn btn-danger btn-sm">submit</button>
             <a href="{{URL::to('/branch')}}"class="btn btn-light btn-sm">Cancel</a>
        {{ Form::close() }}
        </div>
    </div>
  </div>
@endsection
