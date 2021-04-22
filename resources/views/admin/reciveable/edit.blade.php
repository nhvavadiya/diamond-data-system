@extends('templates.master')
@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3>Edit Expense</h3>
            {{Form::open([
                'url' => '/update-reciveable',
                'method' => 'put',
                'class' => 'form expense-form'
            ])}}
            {{ Form::hidden('expense_id', !empty(Request::segment(2)) ? Request::segment(2) : null, [
                    'id' => 'expense_id'
                ]) }}

            <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('date', 'date* ') }} 
                           {{Form::text('date',\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y'),['class'=>'form-control  date-edit','placeholder'=>'Date','required','id' => ' date-edit'])}}
                           </div>
                           <span class="error text-danger">
                         {{$errors->first('date')}}
                       </span>
                    </div>
                </div>
                
            <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('invoice_id', 'invoice id* ') }}
                          {{ Form::text('invoice_id', null, [ 'class' => 'form-control invoice_id-edit', 'placeholder' => 'invoice_id',   'required','id' => ' invoice_id-edit'])}}
                         </div>
                         <span class="error text-danger">
                           {{$errors->first('invoice_id')}}
                         </span>
                       
                        
                    </div>
                </div>
                       
          
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        {{ Form::label('note', 'Note') }}
                        {{Form::textarea('note','',['class'=>'form-control no-resize remark-edit','placeholder'=>'Notes','rows'=>'2','id' => ' note-edit'])}}
                       </div>
                        <span class="error text-danger">
                            {{$errors->first('note')}}
                        </span>
                        </div>
                    </div>
                </div>
                        {{
                    Form::submit('Save',[ 
                        'class' => 'btn btn-primary mr-2'
                    ])
                }}
                <a href="{{URL::to('/reciveable')}}"class="btn btn-light">Cancel</a>

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