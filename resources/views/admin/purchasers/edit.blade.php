@extends('templates.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3>Edit Purchaser</h3>

            {{Form::open([
                'url' => '/update-purchaser',
                'method' => 'put',
                'class' => 'form purchaser-form'
            ])}}
                {{ Form::hidden('purchaser_id', !empty(Request::segment(2)) ? Request::segment(2) : null, [
                    'id' => 'purchaser_id'
                ]) }}
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail *') }}
                            {{ Form::text('email', !empty($purchaser->email) ? $purchaser->email : null, [
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
                            {{ Form::text('surname', !empty($purchaser->surname) ? $purchaser->surname : null, [
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
                            {{ Form::text('name', !empty($purchaser->name) ? $purchaser->name : null, [
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
                            {{ Form::text('nick_name', !empty($purchaser->nick_name) ? $purchaser->nick_name : null, [
                                'class' => 'form-control nick_name',
                                'placeholder' => 'Nick Name',
                                'maxlength' => 50
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('nick_name')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('position', 'Position') }}
                            {{ Form::text('position', !empty($purchaser->position) ? $purchaser->position : null, [
                                'class' => 'form-control position',
                                'placeholder' => 'Position',
                                'maxlength' => 50
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
                            {{ Form::text('branch', !empty($purchaser->branch) ? $purchaser->branch : null, [
                                'class' => 'form-control branch',
                                'placeholder' => 'Branch'
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
                            {{ Form::text('mobile', !empty($purchaser->mobile) ? $purchaser->mobile : null, [
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
                            {{ Form::text('chat', !empty($purchaser->chat) ? $purchaser->chat : null, [
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
                            {{ Form::text('skype', !empty($purchaser->skype) ? $purchaser->skype : null, [
                                'class' => 'form-control skype',
                                'placeholder' => 'Skype'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('skype')}}
                        </span>
                    </div>
                </div>
                {{
                    Form::submit('Save', [ 
                        'class' => 'btn btn-danger btn-sm'
                    ])
                }}
                <a href="{{URL::to('/purchaser')}}"class="btn btn-light btn-sm">Cancel</a>
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