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
            <h3>Edit</h3>
            {{Form::open(['url'=>'users/'.encrypt($users->id),'method'=>'put','class'=>'form','files'=>'true'])}}
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail ') }}
                            {{ Form::text('email', !empty($users->email) ? $users->email : null, [
                                'class' => 'form-control email',
                                'placeholder' => 'Email',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('email')}}
                        </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Name ') }}
                            {{ Form::text('name', !empty($users->name) ? $users->name : null, [
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
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{Form::label('password', 'Password')}}
                           {{Form::password('password',['class'=>'form-control','id'=>'password','maxlength'=>'50','placeholder' => 'Enter  password'])}}
                        </div>
                    <div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select name="country" class="form-control add_customer_row" id="country" required >
                                @foreach ($country as $key=>$value)
                                @if ($users->country_id == $key)
                                    <option selected  value="{{$key}}">{{$value}}</option>
                                @else
                                    <option value="{{$key}}">{{$value}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    <div>
                </div>
             <button class="btn btn-danger btn-sm">submit</button>
             <a href="{{URL::to('/users')}}"class="btn btn-light btn-sm">Cancel</a>
        {{ Form::close() }}
        </div>
    </div>
  </div>
@endsection
