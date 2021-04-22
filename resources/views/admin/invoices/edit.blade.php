@extends('templates.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body create-invoice">
                <h3>Update Invoice</h3>
                {{Form::open(['class' => 'form invoice-form','autocomplete' => 'off'])}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header">
                            <input  value="1" name="inv_type" class="inv_type d-none" required/>
                            <tr>
                                <td class="meta-head">NO #</td>
                                <td> <input type="text" value="{{ str_pad($invoice->id, 8, '0', STR_PAD_LEFT) }}" name="no"  readonly  onkeypress="isNumber(event);" required/></td>
                            </tr>
                            <tr>
                                <td class="meta-head">L INV NO #</td>
                                <td><input type="text" value="{{$invoice->l_invoice}}" name="l_invoice" readonly onkeypress="return alphaNumeric(event)" required/></td>
                            </tr>
                            <tr>
                                <td class="meta-head">E INV NO #</td>
                                <td><input type="text" value="{{$invoice->e_invoice}}" name="e_invoice" readonly onkeypress="return alphaNumeric(event)" required/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-invoice-header sec">
                            <tr>
                                <td class="meta-head">DATE</td>
                                <td><input type="text" name="date" readonly value="{{\Carbon\Carbon::parse($invoice->date)->format('D d M Y')}}">  </td>
                            </tr>
                            <tr>
                                <td class="meta-head">TERM</td>
                                <td> <input type="text" id="term"  value="{{$invoice->term}}" required onkeypress="isNumber(event);" name="term" ></td>
                            </tr>
                            <tr>
                                <td class="meta-head">DUE DATE</td>
                                <td><input type="text" value="{{\Carbon\Carbon::parse($invoice->duedate)->format('D d M Y')}}" id="duedate" readonly  name="duedate"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header customer">
                            <tr>
                                <td class="meta-head">CUSTOMER</td>
                                <td colspan="3">
                                    <select name="customer_id" class="add_customer_row select2" id="customer_id" required>
                                        <option value=""></option>
                                        @foreach ($customers as $key=>$value)
                                        @if ($invoice->customer_id == $key)
                                            <option selected  value="{{$key}}">{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="meta-head">REFERENCE</td>
                                <td colspan="3"><input type="text" value="{{$invoice->reference}}" name="reference" /></td>
                            </tr>
                            <tr>
                                <td class="meta-head">BROKER</td>
                                <td ><select  name="is_broker" id="is_broker" class="add_broker">
                                  <option value="1" {{ $invoice->is_broker == 1 ? "selected" : "" }} >YES</option>
                                  <option value="2" {{ $invoice->is_broker == 2 ? "selected" : "" }}>NO</option>
                                </select></td>
                                <td class="meta-head">PERCENTAGE</td>
                                <td><input type='text'  name="percentage"  value="{{$invoice->percentage}}"  required id="percentage" /></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-invoice-header sec  w-auto">
                            <tr>
                                <td class="meta-head">COUNTRY</td>
                                <td>
                                    <select name="country" class="add_customer_row" id="country" required >
                                        @foreach ($country as $key=>$value)
                                        @if ($invoice->country_id == $key)
                                            <option selected  value="{{$key}}">{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="meta-head">UNIT PRICE</td>
                                <td><input type="text" value="{{$invoice->unit_price}}" name="single_unit_price" class="allownumericwithdecimal" /></td>  
                            </tr>
                            <tr>
                                <td class="meta-head">RATE</td>
                                <td><input type="text" value="{{$invoice->rate}}" name="rate" class="allownumericwithdecimal" /></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group-a">
                    <br>
                    {{-- <input type="submit" class="btn btn-primary btn-sm primary-form-save" value="Save"> --}}
                </div>
                {{ Form::close() }}
                <div id="contact_form" >
                    {{Form::open([ 'url' => "#", 'method' => 'post','class' => 'form invoice-second-form'])}} 
                        <div class="row mt-4 text-right">
                            <div class="col-md-12">
                                <h3 class="float-left">Create Invoice details</h3>
                                <input type="hidden" value="{{$invoice->id}}" name="invoice_id" id="invoice_id">
                                <input type="hidden" name="is_edit" value="1">
                                <select class="add_gia_row-a" name="add_gia" id="add_gia" required>
                                    <option value="1">GIA</option>
                                    <option value="2">NO GIA </option>
                                </select>
                                <select class="add_gia_row-a" name="add_gia_details" id="add_gia_details">
                                    {{-- <option>D-764</option>
                                    <option>R-48</option> --}}
                                </select>
                                <button id="addrow" type="button" class="btn btn-success btn-rounded btn-icon">
                                    <i class="ti-plus"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-rounded btn-icon delete-row">
                                    <i class="ti-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="items">
                                    <tr>
                                        <th style="width: 2%"></th>
                                        <th style="width: 3%">No</th>
                                        <th>BRANCH</th>
                                        <th style="width: 8%">GIA/NO GIA</th>
                                        <th style="width: 30%">DETAILS</th>
                                        <th style="width: 8%">PCS</th>
                                        <th>CARAT</th>
                                        <th>UNIT PRICE</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                    <tbody>
                                        @foreach ($invoiceDetails as $item)
                                        <tr class="item-row">
                                            <td class="item-name text-center"><input type="checkbox" name="record" data-id="{{$item->gia_id }}" data-type="{{ $item->is_gia }}"></td>
                                            <td class="item-name">{{ $loop->iteration }}</td>
                                            <td class="item-name"><input type="text" value="{{ $item->branch }}" name="branch[]" id="branch"></td>
                                            <td class="description">
                                                <input type="hidden"  name="invoice_gia_id[]" value="{{$item->gia_id}}" />
                                                <input type="hidden"  value="{{ $item->is_gia }}" name="gia_type[]" readonly />
                                                {{ $item->is_gia == 1 ? "Gia" : "No Gia" }}
                                            </td>
                                            <td class="description"><input type="text" readonly value="{{$item->details}}" name="gia_details[]"></td>
                                            <td class="description"><input type="text" value="{{$item->pcs}}" name="pcs[]" id="pcs"></td>
                                            <td><input type="text" class="qty allownumericwithdecimal" value="{{$item->carat}}" name="carat[]" id="carat"></td>
                                            <td class="text-right"><input type="text" value="{{$item->unit_price}}" name="unit_price[]" class="cost allownumericwithdecimal"></td>
                                            <input type="hidden" name="final_amt[]" class="final_amt" value="{{$item->amount}}">
                                            <input type="hidden"  name="gia_id[]" value="{{$item->gia_id}}" />
                                            <td class="text-right" name="amount"><span class="price">{{$item->amount}}</span></td>
                                        </tr>
                                        @endforeach
                                        {{-- Require extra <tr> when all entry remove because addRow depend upon item-row class  --}}
                                        <tr class="item-row">
                                        </tr>
                                    </tbody>
                                    <tr>
                                        <td colspan="6" class="blank"> </td>
                                        <td colspan="2" class="total-line">Subtotal :</td>
                                        <td class="total-value"><div id="subtotal">000.00</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="blank"> </td>
                                        <td colspan="2" class="total-line">Total :</td>
                                        <td class="total-value"><div id="total">000.00</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="blank"> </td>
                                        <td colspan="2" class="total-line">Amount Paid :</td>
                                        <td class="total-value"><div id="paid">000.00</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="blank"> </td>
                                        <td colspan="1" class="total-line balance">Carat :</td>
                                        <td class="total-value balance"><div id="total-carat">00.00</div></td>
                                        <input type="hidden" name="carat_total" id="total-carat-value" value="">
                                        <td colspan="1" class="total-line balance">Balance Due :</td>
                                        <td class="total-value balance"><div class="due">000.00</div></td>
                                        <input type="hidden" name="due_total" id="total-due-value" value="">
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="form-group-a " >
                            {{-- <a class="btn btn-primary btn-sm" >Save</a> --}}
                            {{-- <input type="button" class="btn btn-primary btn-sm invoice-details-form-save" value="Save"> --}}
                            <button data-id="0" class="btn btn-primary btn-sm invoice-details-form-save">Save</button>
                            <button data-id="1" class="btn btn-primary btn-sm invoice-details-form-save">Save & Print</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div> 
</div>
@stop
@section('script')
<script src="{{ URL::to('public/js/invoice.js') }}"></script>

<script type="text/javascript">
// var giaArray = [];
// var noGiaArray = [];
$(document).ready(function() {
    $('.select2').select2();

    setExistingGiaAndNoGiaArray();
    getGiaAndNoGiaValues($("#add_gia" ).val());

    update_total();
    $(document).on('keypress keyup blur', '.allownumericwithdecimal', function (e) {
        $(this).val($(this).val().replace(/[^0-9\.]/g,''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    $('#percentage').blur(function() {
        var per = $(this).val();
        if(parseInt(per) < 1 || parseInt(per) > 50 || isNaN(per)) {
            $(this).val('');
        }
    });

    $( "#term" ).blur(function() {
        var term = $(this).val();
        if (term) {
            var tDate = new Date();
            tDate.setDate(tDate.getDate() + parseInt(term));
            // https://momentjs.com/docs/
            var dueDate = moment(tDate).format('ddd DD MMM YYYY');
            $("#duedate").val(dueDate);
        }
    });

    $('#is_broker').on('change',function() {
        if ($(this).val() == 2) {
            $('#percentage').prop('required',false);
        } else {
            $('#percentage').prop('required',true);
        }
    });

    $('#add_gia').on('change',function() {
        var giaType = this.value;
        getGiaAndNoGiaValues(giaType);
    });

    $(".invoice-details-form-save").click(function(e) {
        var formSaveType = $(this).attr("data-id");
        $(".invoice-details-form-save").prop("disabled",true);
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var dataString = $(".invoice-form, .invoice-second-form").serialize();
        if ( $(".item-row").length <= 1) {
            swal("Please add gia details");
            $(".invoice-details-form-save").prop("disabled",false);
            return false;
        }
        $.ajax({
            type: "POST",
            url:'{{URL::to("store-invoice-details")}}',
            data: dataString, // serializes the form's elements.
            success: function(data) {
                if(data.status == true) {
                    if (formSaveType == 1) {
                        window.location = '{{URL::to("invoice-details-print")}}/' + data.id;
                    } else {
                        window.location = '{{URL::to("invoice")}}';
                    }
                } else {
                    swal("Something went wrong!", "", "error");
                }
                    $(".invoice-details-form-save").prop("disabled", false);
            }
        });
    });
    
    // $(".invoice-print").click(function(e) {
    //     $(".invoice-print").prop("disabled",true);
    //     e.preventDefault(); // avoid to execute the actual submit of the form.
    //     var dataString = $(".invoice-form, .invoice-second-form").serialize();
    //     if ( $(".item-row").length <= 1) {
    //         swal("Please add gia details");
    //         $(".invoice-print").prop("disabled",false);
    //         return false;
    //     }
    //     $.ajax({
    //         type: "POST",
    //         url:'{{URL::to("store-invoice-details")}}',
    //         data: dataString, // serializes the form's elements.
    //         success: function(data) {
    //             if(data.status == true) {
    //                 window.location = '{{URL::to("store-invoice-details-print")}}/' + data.id;
    //             } else {
    //                 swal("Something went wrong!", "", "error");
    //             }
    //                 $(".invoice-print").prop("disabled", false);
    //         }
    //     });
    // });
        
});

function getGiaAndNoGiaValues(giaType) {
    if (giaType) {
        $.ajax({
            type: "GET",
            url:'{{URL::to("gia-type-details")}}/' + giaType,
            // data: {type : giaType}
            success: function(response) {
                if(response.status == true) {
                    var select = $('#add_gia_details');
                    select.empty();
                    $.each(response.data, function( index, value ) {
                        if (giaType == 1) {
                            var mixValue = value.stock + ' ' +value.fancy_color_intensity + ' ' + value.fancy_color_overtone + ' ' + value.fancy_color + ' ' + value.shape + ' ' + value.weight + ' ' +value.clarity;
                            select.append('<option data-id="'+value.id+'" data-type="1"  value="'+ mixValue+'">'+ value.stock +'</option>');
                        }
                        if (giaType == 2) {
                            select.append('<option data-id="'+value.id+'" data-type="2" data-pcs="'+value.pc+'" data-carat="'+value.carat+'">'+ value.details +'</option>');
                        } 
                    });
                }
            }
        });
    }
}

function isNumber(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    // var regex = /[0-9]|\./;
    var regex = /[0-9]/;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
}

function alphaNumeric(e) {
    var keyCode = e.keyCode || e.which;
    //Regex for Valid Characters i.e. Alphabets and Numbers.
    var regex = /^[A-Za-z0-9]+$/;
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        return false;
    }
    return true;
}

function setExistingGiaAndNoGiaArray() {
    $("input[name='invoice_gia_id[]']").map(function(){
        if ($(this).siblings("input[name='gia_type[]']").val() == 1) {
            giaArray.push(parseInt($(this).val()));
        }
        if ($(this).siblings("input[name='gia_type[]']").val() == 2) {
            noGiaArray.push(parseInt($(this).val()));
        }
    });
}

</script>
@stop
