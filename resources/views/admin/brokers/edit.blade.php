@extends('templates.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3>Edit Broker</h3>

            {{Form::open([
                'url' => '/update-broker',
                'method' => 'put',
                'class' => 'form broker-form'
            ])}}
                {{ Form::hidden('broker_id', !empty(Request::segment(2)) ? Request::segment(2) : null, [
                    'id' => 'broker_id'
                ]) }}
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail *') }}
                            {{ Form::text('email', $broker->email, [
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
                            {{ Form::text('surname', !empty($broker->surname) ? $broker->surname : null, [
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
                            {{ Form::text('name', !empty($broker->name) ? $broker->name : null, [
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
                            {{ Form::label('gender', 'Gender *') }}
                            {{ Form::select('gender',[1 => 'Male', 2 => 'Female'], !empty($broker->gender) ? $broker->gender : null, [
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
                            {{ Form::text('date_of_birth', !empty($broker->date_of_birth) ? \Carbon\Carbon::parse($broker->date_of_birth)->format('d-m-Y') : null, [
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
                            {{ Form::label('reference', 'Reference') }}
                            {{ Form::text('reference', !empty($broker->reference) ? $broker->reference : null, [
                                'class' => 'form-control reference',
                                'placeholder' => 'Reference'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('reference')}}
                        </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('address', 'Address *') }}
                            {{ Form::textarea('address', !empty($broker->address) ? $broker->address : null, [
                                'class' => 'form-control address',
                                'placeholder' => 'Address',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('address')}}
                        </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('mobile', 'Mobile *') }}
                            {{ Form::text('mobile', !empty($broker->mobile) ? $broker->mobile : null, [
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
                            {{ Form::label('other_mobile', 'Other Mobile') }}
                            {{ Form::text('other_mobile', !empty($broker->other_mobile) ? $broker->other_mobile : null, [
                                'class' => 'form-control other_mobile',
                                'placeholder' => 'Other Mobile',
                                'autocomplete' => 'off',
                                'oninput' => 'checkOtherMobile(this.value)',
                                'maxlength' => 15,
                                'minlength' => 10,
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('other_mobile')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('fax', 'Fax') }}
                            {{ Form::text('fax', !empty($broker->fax) ? $broker->fax : null, [
                                'class' => 'form-control fax',
                                'placeholder' => 'Fax'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('fax')}}
                        </span>
                    </div>
                </div>


                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('chat', 'Chat') }}
                            {{ Form::text('chat', !empty($broker->chat) ? $broker->chat : null, [
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
                            {{ Form::text('skype', !empty($broker->skype) ? $broker->skype : null, [
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
                    Form::submit('Save',[ 
                        'class' => 'btn btn-primary btn-sm'
                    ])
                }}
                <a href="{{URL::to('/broker')}}"class="btn btn-light btn-sm">Cancel</a>

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