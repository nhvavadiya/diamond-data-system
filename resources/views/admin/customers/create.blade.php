@extends('templates.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3>Add Customer</h3>

            {{Form::open([
                'url' => '/store-customer',
                'method' => 'post',
                'class' => 'form customer-form'
            ])}}
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail *') }}
                            {{ Form::text('email', null, [
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
                            {{ Form::text('surname', null, [
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
                            {{ Form::text('name', null, [
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
                            {{ Form::label('company_name', 'Company Name') }}
                            {{ Form::text('company_name', null, [
                                'class' => 'form-control company_name',
                                'placeholder' => 'Company Name',
                                'maxlength' => 50
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('company_name')}}
                        </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('gender', 'Gender *') }}
                            {{ Form::select('gender',[1 => 'Male', 2 => 'Female'], null, [
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
                            {{ Form::label('position', 'Position') }}
                            {{ Form::text('position', null, [
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
                            {{ Form::label('date_of_birth', 'Date of Birth *') }}
                            {{ Form::text('date_of_birth', null, [
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
                            {{ Form::text('reference', null, [
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
                            {{ Form::textarea('address', null, [
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
                            {{ Form::text('mobile', null, [
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
                            {{ Form::text('other_mobile', null, [
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
                            {{ Form::text('fax', null, [
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
                            {{ Form::text('chat', null, [
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
                            {{ Form::text('skype', null, [
                                'class' => 'form-control skype',
                                'placeholder' => 'Skype'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('skype')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('rapnet_id', 'Rapnet Id') }}
                            {{ Form::text('rapnet_id', null, [
                                'class' => 'form-control rapnet_id',
                                'placeholder' => 'Rapnet Id',
                                'maxlength' => 10,
                                'oninput' => 'checkRapNetId(this.value)',
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('rapnet_id')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('website', 'Website') }}
                            {{ Form::text('website', null, [
                                'class' => 'form-control website',
                                'placeholder' => 'Website',
                                'maxlength' => 100,
                                'oninput' => 'checkRapNetId(this.value)',
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('website')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('whatsapp', 'Whats App') }}
                            {{ Form::text('whatsapp', null, [
                                'class' => 'form-control whatsapp',
                                'placeholder' => 'Whats App',
                                'maxlength' => 10,
                                'oninput' => 'checkWhatsApp(this.value)',
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('whatsapp')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('remark', 'Remark') }}
                            {{ Form::text('remark', null, [
                                'class' => 'form-control remark',
                                'placeholder' => 'Remark',
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('remark')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('contact_person', 'Contact Person') }}
                            {{ Form::text('contact_person', null, [
                                'class' => 'form-control contact_person',
                                'placeholder' => 'Contact Person',
                                'maxlength' => 50
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('contact_person')}}
                        </span>
                    </div>
                </div>
                {{
                    Form::submit('Save', [ 
                        'class' => 'btn btn-primary btn-sm'
                    ])
                }}
                <a href="{{URL::to('/customer')}}"class="btn btn-light">Cancel</a>

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

    function checkRapNetId(value) {
        $('.rapnet_id').val(validMobileNumber(value));
    }

    function checkWhatsApp(value) {
        $('.whatsapp').val(validMobileNumber(value));
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