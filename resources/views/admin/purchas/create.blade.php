@extends('templates.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body create-invoice">
                <h3>Create purchas</h3>
                {{Form::open(['class' => 'form purchas-form','autocomplete' => 'off'])}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header table">
                            <input  value="1" name="inv_type" class="inv_type d-none" required/>
                            <tr>
                                <td class="meta-head">NO #</td>
                                <td> <input type="text"  value="{{$nextId}}" name="no" readonly onkeypress="isNumber(event);" required/></td>
                            </tr>
                            <tr>
                                <td class="meta-head">L INV NO #</td>
                                <td><input type="text"  value="{{$nextId}}" name="l_invoice" onkeypress="return alphaNumeric(event)" required/></td>
                            </tr>
                            <tr>
                                <td class="meta-head">E INV NO #</td>
                                <td><input type="text"  value="{{$nextId}}" name="e_invoice" onkeypress="return alphaNumeric(event)" required/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-invoice-header sec table">
                            <tr>
                                <td class="meta-head">DATE</td>
                                <td><input type="text" name="date" readonly value="{{\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y')}}">  </td>
                            </tr>
                            <tr>
                                <td class="meta-head">TERM</td>
                                <td> <input type="text" id="term" required onkeypress="isNumber(event);" name="term" ></td>
                            </tr>
                            <tr>
                                <td class="meta-head">DUE DATE</td>
                                <td><input type="text" value=""  id="duedate" readonly  name="duedate"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header table">
                            <tr>
                                <td class="meta-head">SELLER</td>
                                <td colspan="3">
                                    <select name="customer_id" class="add_customer_row select2" id="customer_id" required>
                                        <option value=""></option>
                                        @foreach ($sellers as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option> 
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="meta-head">REFERENCE</td>
                                <td colspan="3"><input type="text" value=""  name="reference" /></td>
                            </tr>
                            <tr>
                                <td class="meta-head">BROKER</td>
                                <td ><select  name="is_broker" id="is_broker" class="add_broker">
                                  <option value="1">YES</option>
                                  <option value="2">NO</option>
                                </select></td>
                                <td class="meta-head">PERCENTAGE</td>
                                <td><input type='text'  name="percentage" required id="percentage" /></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-invoice-header sec  table">
                            <tr>
                                <td class="meta-head">COUNTRY</td>
                                <td>
                                    <select name="country" class="add_customer_row" id="country" required >
                                        @foreach ($country as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="meta-head">UNIT PRICE</td>
                                <td><input type="text" value=""  name="single_unit_price" class="allownumericwithdecimal" /></td>  
                            </tr>
                            <tr>
                                <td class="meta-head">RATE</td>
                                <td><input type="text" value=""   name="rate" class="allownumericwithdecimal" /></td> 
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group-a mt-3" >
                  {{-- <a onclick="getSubmit()"class="btn btn-primary btn-sm" >Save</a> --}}
                    <input type="submit" class="btn btn-primary btn-sm primary-form-save" value="Save">
                    <br>
                </div>
                {{ Form::close() }}
                <div id="contact_form" >
                    {{Form::open([ 'url' => '/store-purchas', 'method' => 'post','class' => 'form purchas-second-form d-none'])}} 
                        <div class="row mt-4 text-right">
                            <div class="col-md-12">
                                <h3 class="float-left">Create purchas details</h3>
                                <input type="hidden" value="" name="invoice_id" id="invoice_id">
                                <select class="add_gia_row-a" name="add_gia" id="add_gia" required>
                                    <option value="1">GIA</option>
                                    <option value="2">NO GIA </option>
                                </select>
                                <select class="add_gia_row-a" name="add_gia_details" id="add_gia_details">
                                    {{-- <option>D-764</option>
                                    <option>AG-668</option>
                                    <option>AG-394</option>
                                    <option>G-827</option>
                                    <option>EX-905</option>
                                    <option>EX-819</option>
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
                                        <tr class="item-row d-none">
                                            <td class="item-name text-center"><input type="checkbox" name="record"></td>
                                            <td class="item-name"><input type="text" value="" name="no"></td>
                                            <td class="item-name"><input type="text" value="111" name="branch" id="branch"></td>
                                            <td class="description"><input type="text" value="" name="is_gia"></td>
                                            <td class="description"><input type="text" value="" name="details"></td>
                                            <td class="description"><input type="text" value="" name="pcs" id="pcs"></td>
                                            <td><input type="text" class="qty" value="" name="carat" id="carat"></td>
                                            <td class="text-right"><input type="text" class="cost" value="" name="unit_price"></td>
                                            <td class="text-right" name="amount"><span class="price"></span></td>
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
                            <input type="submit" class="btn btn-primary btn-sm invoice-details-form-save" value="Save">
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
$(document).ready(function() {

    // https://bootsnipp.com/snippets/lV88M
    $('.select2').select2();

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
        $('#percentage').prop('required',false);
    });
    
    $('#add_gia').on('change',function() {
        var giaType = this.value;
        getGiaAndNoGiaValues(giaType);
    });
    
    $(".purchas-form").submit(function(e) {
        $('.primary-form-save').prop("disabled",true);
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        // var url = form.attr('action');
        $.ajax({
            type: "POST",
            url:'{{URL::to("store-purchas")}}',
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                if(data.status == true) {
                    getGiaAndNoGiaValues($("#add_gia" ).val());
                    $('.purchas-second-form').removeClass('d-none');
                    $('.primary-form-save').addClass('d-none');
                    $('#invoice_id').val(data.id);
                } else {
                    swal("Something went wrong!", "", "error");
                    $('.primary-form-save').prop("disabled", false);
                }
            }
        });
    });

    $(".purchas-second-form").submit(function(e) {
        $(".delete-row").prop("disabled",true);
        $(".invoice-details-form-save").prop("disabled",true);
        e.preventDefault(); // avoid to execute the actual submit of the form.
        // var form = $(this);
        // var form2 = $(".purchas-form");
        var dataString = $(".purchas-form, .purchas-second-form").serialize();
        if ( $(".item-row").length <= 1) {
            swal("Please add gia details");
            $(".invoice-details-form-save").prop("disabled",false);
            $(".delete-row").prop("disabled", false);
            return false;
        }
        $.ajax({
            type: "POST",
            url:'{{URL::to("store-purchas-details")}}',
            data: dataString, // serializes the form's elements.
            success: function(data) {
                if(data.status == true) {
                    swal("Add details successfully!", "", "success");
                    $(".delete-row").prop("disabled",true);
                    $("#addrow").prop("disabled",true);
                } else {
                    swal("Something went wrong!", "", "error");
                    $(".invoice-details-form-save").prop("disabled",false);
                }
            }
        });
    });
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
                            select.append('<option data-id="'+value.id+'"  value="'+ mixValue+'">'+ value.stock +'</option>');
                        }
                        if (giaType == 2) {
                            select.append('<option data-id="'+value.id+'"  data-pcs="'+value.pc+'" data-carat="'+value.carat+'">'+ value.details +'</option>');
                        }
                    });
                }
            }
        });
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

</script>
@stop
