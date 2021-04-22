@extends('templates.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body create-invoice">
                <h3>Create Memo</h3>
                {{Form::open(['class' => 'form invoice-memo-form','autocomplete' => 'off'])}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header table">
                            <input  value="1" name="inv_type" class="inv_type d-none" required/>
                            <tr>
                                <td class="meta-head">NO #</td>
                                <td> <input type="text"  value="{{$nextId}}" name="no" readonly  required/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-invoice-header sec table">
                            <tr>
                                <td class="meta-head">DATE</td>
                                <td><input type="text" name="date" readonly value="{{\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y')}}">  </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header table">
                            <tr>
                                <td class="meta-head">CUSTOMER</td>
                                <td>
                                    <select name="customer_id" class="add_customer_row select2" id="customer_id" required>
                                        <option value=""></option>
                                        @foreach ($customers as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option> 
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="meta-head">REFERENCE</td>
                                <td><input type="text" value=""  name="reference" /></td>
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
                <div class="form-group-a" >
                  {{-- <a onclick="getSubmit()"class="btn btn-primary btn-sm" >Save</a> --}}
                    <input type="submit" class="btn btn-primary btn-sm primary-form-save" value="Save">
                    <br>
                </div>
                {{ Form::close() }}
                <div id="contact_form" >
                    {{Form::open([ 'url' => '/store-memo-details', 'method' => 'post', 'files' => true, 'class' => 'form invoice-second-form d-none'])}} 
                        <div class="row mt-4 text-right">
                            <div class="col-md-12">
                                <h3 class="float-left">Create Memo details</h3>
                                <input type="hidden" value="" name="invoice_id" id="invoice_id">
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
                                        <th style="width: 12%">FILE</th>
                                        <th style="width: 8%">GIA/NO GIA</th>
                                        <th style="width: 30%">DETAILS</th>
                                        <th style="width: 15%">REMARK</th>
                                        <th style="width: 8%">PCS</th>
                                        <th>CARAT</th>
                                        <th>UNIT PRICE</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                    <tbody>
                                        <tr class="item-row d-none">
                                            {{-- <td class="item-name text-center"><input type="checkbox" name="record"></td>
                                            <td class="item-name"><input type="text" value="" name="no"></td>
                                            <td class="item-name"><input type="text" value="111" name="branch" id="branch"></td>
                                            <td class="item-name">
                                                <input type="file" class="w-100" name="gia_file[]"><br>
                                            </td>
                                            <td class="description"><input type="text" value="" name="is_gia"></td>
                                            <td class="description"><input type="text" value="" name="details"></td>
                                            <td class="description"><input type="text" value="" name="pcs" id="pcs"></td>
                                            <td><input type="text" class="qty" value="" name="carat" id="carat"></td>
                                            <td class="text-right"><input type="text" class="cost" value="" name="unit_price"></td>
                                            <td class="text-center" name="amount"><span class="price"></span></td> --}}
                                        </tr>
                                    </tbody>
                                    <tr>
                                        <td colspan="8" class="blank"> </td>
                                        <td colspan="2" class="total-line">Subtotal :</td>
                                        <td class="total-value"><div id="subtotal">000.00</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="blank"> </td>
                                        <td colspan="2" class="total-line">Total :</td>
                                        <td class="total-value"><div id="total">000.00</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="blank"> </td>
                                        <td colspan="2" class="total-line">Amount Paid :</td>
                                        <td class="total-value"><div id="paid">000.00</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="blank"> </td>
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
<script src="{{ URL::to('public/js/invoice_memo_create.js') }}"></script>

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

    $('#add_gia').on('change',function() {
        var giaType = this.value;
        getGiaAndNoGiaValues(giaType);
    });

    $(document).on('blur', ' .qty', function (e) {
        var typeIdentify = $(this).parent('td').siblings('td').children('.gia_type_val').val();
        if (typeIdentify == 2) {
            var thisQty = $(this);
            var currentStock = 0;
            var giaId = $(this).parent('td').siblings('.gia_id').val();
            $(".invoice-details-form-save").prop("disabled",true);
            $.ajax({
                type: "GET",
                url:'{{URL::to("get-current-no-gia-carat-stock")}}/' + giaId,
                success: function(response) {
                    // console.log(response);
                    if (response > 0) {
                        currentStock = parseFloat(response);
                        $(".invoice-details-form-save").prop("disabled",false);
                    }
                    if (currentStock < parseFloat(thisQty.val())) {
                        swal("Available carat : "  + currentStock);
                        thisQty.val(0);
                    }
                    update_price2(thisQty);
                }
            });
        }
    });

    $(".invoice-memo-form").submit(function(e) {
        $('.primary-form-save').prop("disabled",true);
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        $.ajax({
            type: "POST",
            url:'{{URL::to("store-memo")}}',
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                if(data.status == true) {
                    getGiaAndNoGiaValues($("#add_gia" ).val());
                    $('.invoice-second-form').removeClass('d-none');
                    $('.primary-form-save').addClass('d-none');
                    $('#invoice_id').val(data.id);
                } else {
                    swal("Something went wrong!", "", "error");
                    $('.primary-form-save').prop("disabled", false);
                }
            }
        });
    });

    $(".invoice-second-form").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        // var dataString = $(".invoice-memo-form, .invoice-second-form").serialize();
        if ( $(".item-row").length <= 1) {
            swal("Please add gia details");
            return false;
        }
        var formData  = new FormData(this);
        formData.append('date', $('input[name="date"]').val());
        formData.append('customer_id', $('select[name="customer_id"] option:selected').val());
        formData.append('reference', $('input[name="reference"]').val());
        formData.append('country', $('select[name="country"] option').filter(':selected').val());
        formData.append('single_unit_price', $('input[name="single_unit_price"]').val());
        formData.append('rate', $('input[name="rate"]').val());
        $(".delete-row").prop("disabled",true);
        $(".invoice-details-form-save").prop("disabled",true);
        $.ajax({
            type: "POST",
            url:'{{URL::to("store-memo-details")}}',
            cache       : false,
            contentType : false,
            processData : false,
            data: formData, // serializes the form's elements.
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
                            select.append('<option data-id="'+value.id+'" data-type="1" value="'+ mixValue+'">'+ value.stock +'</option>');
                        }
                        if (giaType == 2) {
                            select.append('<option data-id="'+value.id+'" data-type="1" data-pcs="'+value.pc+'" data-carat="'+value.carat+'">'+ value.details +'</option>');
                        }
                    });
                }
            }
        });
    }
}

</script>
@stop
