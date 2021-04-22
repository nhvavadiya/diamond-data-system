@extends('templates.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3>Edit</h3>

            {{Form::open([
                'url' => '/update-saler',
                'method' => 'put',
                'class' => 'form broker-form'
            ])}}
                 {{ Form::hidden('saler_id', !empty(Request::segment(2)) ? Request::segment(2) : null, [
                    'id' => 'saler_id'
                ]) }}
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail *') }}
                            {{ Form::text('email', !empty($saler->email) ? $saler->email : null, [
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
                            {{ Form::label('surname', 'Surname *') }}
                            {{ Form::text('surname', !empty($saler->surname) ? $saler->surname : null, [
                                'class' => 'form-control surname',
                                'placeholder' => 'Surname',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('surname')}}
                        </span>
                    <div>
                <div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('name', 'Name *') }}
                            {{ Form::text('name', !empty($saler->name) ? $saler->name : null, [
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
                            {{ Form::label('nick_name', 'Nick Name') }}
                            {{ Form::text('nick_name', !empty($saler->nick_name) ? $saler->nick_name : null, [
                                'class' => 'form-control nick_name',
                                'placeholder' => 'nick_name',
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('nick_name')}}
                        </span>
                    <div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('gender', 'Gender *') }}
                            {{ Form::select('gender',[1 => 'Male', 2 => 'Female'],  !empty($saler->gender) ? $saler->gender : null, [
                                'class' => 'form-control gender',
                                'placeholder' => 'Select Gender',
                                'required'
                            ])}}
                        
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('gender')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('date_of_birth', 'Date of Birth *') }}
                            {{ Form::text('date_of_birth',  !empty($saler->date_of_birth) ? $saler->date_of_birth : null, [
                                'class' => 'form-control date_of_birth',
                                'placeholder' => 'Date of Birth',
                                'required',
                                'autocomplete' => 'off'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('date_of_birth')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('position', 'Position') }}
                            {{ Form::text('position', !empty($saler->position) ? $saler->position : null, [
                                'class' => 'form-control position',
                                'placeholder' => 'position'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('position')}}
                        </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('branch', 'Branch') }}
                            {{ Form::text('branch', !empty($saler->branch) ? $saler->branch : null, [
                                'class' => 'form-control branch',
                                'placeholder' => 'branch',
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('branch')}}
                        </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('mobile', 'Mobile *') }}
                            {{ Form::text('mobile', !empty($saler->mobile) ? $saler->mobile : null, [
                                'class' => 'form-control mobile',
                                'placeholder' => 'Mobile',
                                'autocomplete' => 'off',
                                'oninput' => 'checkMobile(this.value)',
                                'maxlength' => 10,
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('mobile')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('chat', 'Chat') }}
                            {{ Form::text('chat', !empty($saler->chat) ? $saler->chat : null, [
                                'class' => 'form-control chat',
                                'placeholder' => 'chat'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('chat')}}
                        </span>
                    </div>
                </div>

                
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('skype', 'Skype') }}
                            {{ Form::text('skype', !empty($saler->skype) ? $saler->skype : null, [
                                'class' => 'form-control skype',
                                'placeholder' => 'Skype'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('skype')}}
                        </span>
                    </div>
                </div>
              
             <button class="btn btn-danger btn-sm">submit</button>
             <a href="{{URL::to('/saler')}}"class="btn btn-light btn-sm">Cancel</a>
                        {{ Form::close() }}
        </div>
    </div>
  </div>
@endsection
@section('script')
<script type="text/javascript">
    $('.date_of_birth').datepicker({
        format: 'dd-mm-yyyy'
    });
    function checkOtherMobile(value) {
        $('.other_mobile').val(validMobileNumber(value));
    }
    function checkMobile(value) {
        $('.mobile').val(validMobileNumber(value));
    }
    function validMobileNumber(value) {
        if (/[a-zA-Z!@#$&()\\`.+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
            return value.substring(0, (value.length - 1));
        } else {
            return value;
        }
    }
</script>
@endsection