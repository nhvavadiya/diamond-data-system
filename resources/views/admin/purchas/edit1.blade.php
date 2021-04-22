 @extends('templates.master') 
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3>Edit purchas</h3>

            {{Form::open([
                'url' => 'purchas/'
               . $invoice->id,
                'method' => 'put',
                'class' => 'form purchas-form'
            ])}}
                {{ Form::hidden('invoice_id', !empty(Request::segment(2)) ? Request::segment(2) : null, [
                    'id' => 'invoice_id'
                ]) }}
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('l_invoice', 'L_invoice') }}
                            {{ Form::text('l_invoice', $invoice->l_invoice, [
                                'class' => 'form-control l_invoice',
                                'placeholder' => 'L_invoice',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('l_invoice')}}
                        </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('e_invoice', 'E_invoice') }}
                       {{ Form::text('e_invoice', $invoice->e_invoice, [
                                'class' => 'form-control e_invoice',
                                'placeholder' => 'E_invoice',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('e_invoice')}}
                        </span>
                    <div>
                <div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        <div class="form-group">
                        {{ Form::label('customer_id', 'Customer_id') }}
                       {{ Form::text('customer_id',  $invoice->customer_id, [
                                'class' => 'form-control customer_id',
                                'placeholder' => 'Customer_id',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('customer_id')}}
                        </span>
                    <div>
                </div>
                
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('seller_id', 'Seller_id') }}
                       {{ Form::text('seller_id',  $invoice->seller_id, [
                                'class' => 'form-control seller_id',
                                'placeholder' => 'Seller_id',
                                'required'
                            ])}}
                        
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('seller_id')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('reference', 'Reference') }}
                       {{ Form::text('reference',  $invoice->reference, [
                                'class' => 'form-control reference',
                                'placeholder' => 'Reference',
                                'required'
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
                        {{ Form::label('is_broker', 'Is_broker') }}
                        {{Form::select('is_broker', $invoice->is_broker,['1'=>'Yes','2'=>'No'],'',['class'=>'form-control select-padding-0','id'=>'is_broker','placeholder'=>'Is_broker'])}}
                        <span class="error text-danger">
                            {{$errors->first('is_broker')}}
                        </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('percentage', 'Percentage') }}
                       {{ Form::text('percentage',  $invoice->percentage, [
                                'class' => 'form-control percentage',
                                'placeholder' => 'Percentage',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('percentage')}}
                        </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('date', 'Date') }}
                        {{Form::text('date',\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y'), $invoice->date,['class'=>'form-control  date','placeholder'=>'Date','required'])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('date')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('term', 'Term') }}
                       {{ Form::text('term',  $invoice->term, [
                                'class' => 'form-control term',
                                'placeholder' => 'Term',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('term')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('duesate', 'Duesate') }}
                       {{ Form::text('duesate',  $invoice->duesate, [
                                'class' => 'form-control duesate',
                                'placeholder' => 'Duesate',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('duesate')}}
                        </span>
                    </div>
                </div>


                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('payment_in', 'Payment_in') }}
                        {{Form::select('payment_in', $invoice->payment_in,['1'=>'Cash','2'=>'Debit Card','3'=>'Credit Card','4'=>'Cheque'],'',['class'=>'form-control select-padding-0','id'=>'payment_method','placeholder'=>'Select Payment Method'])}}
                        </div>
                        <span class="error text-danger">
                            {{$errors->first('payment_in')}}
                        </span>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('carat_total', 'Carat_total') }}
                       {{ Form::text('carat_total',  $invoice->carat_total, [
                                'class' => 'form-control carat_total',
                                'placeholder' => 'Carat_total',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                        {{$errors->first('carat_total')}}
                        </span>
                    <div>
                <div>
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('total', 'Total') }}
                       {{ Form::text('total',  $invoice->total, [
                                'class' => 'form-control total',
                                'placeholder' => 'Total',
                                'required'
                            ])}}
                        </div>
                        <span class="error text-danger">
                        {{$errors->first('total')}}
                        </span>
                    <div>
                <div>
            
                {{
                    Form::submit('Save',[ 
                        'class' => 'btn btn-primary mr-2'
                    ])
                }}
                <a href="{{URL::to('/purchas')}}"class="btn btn-light">Cancel</a>

            {{ Form::close() }}
        </div>
    </div>
  </div>
@endsection
@section('script')
<script type="text/javascript">


$('.date').datepicker({
    format: 'dd-mm-yyyy'
});

</script>

@endsection