@extends('templates.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body create-invoice">
                <h3>Update memo Invoice</h3>
                {{Form::open(['class' => 'form memo-first-form','autocomplete' => 'off'])}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header">
                            <input  value="1" name="inv_type" class="inv_type d-none" required/>
                            <tr>
                                <td class="meta-head">NO #</td>
                                <td> <input type="text" value="{{ str_pad($invoice->id, 8, '0', STR_PAD_LEFT) }}" name="no"  readonly  onkeypress="isNumber(event);" required/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-invoice-header sec">
                            <tr>
                                <td class="meta-head">DATE</td>
                                <td><input type="text" name="date" readonly value="{{\Carbon\Carbon::parse($invoice->date)->format('D d M Y')}}">  </td>
                            </tr>
                            <tr class="d-none hide-fields">
                                <td class="meta-head">TERM</td>
                                <td> <input type="text" id="term" required onkeypress="isNumber(event);" name="term" ></td>
                            </tr>
                            <tr class="d-none hide-fields">
                                <td class="meta-head">DUE DATE</td>
                                <td><input type="text" value=""  id="duedate" readonly  name="duedate"></td>
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
                            <tr class="d-none hide-fields">
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
                    {{Form::open([ 'url' => '/store-invoice', 'method' => 'post', 'files' => true  ,'class' => 'form memo-second-form'])}}
                        <div class="row mt-4 text-right">
                            <div class="col-md-12">
                                <h3 class="float-left">Create memo details</h3>
                                <input type="hidden" value="{{$invoice->id}}" name="invoice_id" id="invoice_id">
                                <input type="hidden" name="is_edit" value="1">
                                <select class="add_gia_row-a" name="add_gia" id="add_gia" required>
                                    <option value="1">GIA</option>
                                    <option value="2">NO GIA </option>
                                </select>
                                <select class="add_gia_row-a" name="add_gia_details" id="add_gia_details">
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
                                        <th>RETURN CARAT</th>
                                        <th>SOLD CARAT</th>
                                        <th>AMOUNT</th>
                                        <th>SOLD AMOUNT</th>
                                    </tr>
                                    <tbody>
                                        @foreach ($invoiceDetails as $item)
                                        <tr class="item-row">
                                            <td class="item-name text-center"><input type="checkbox" name="record" data-id="{{$item->gia_id }}" data-type="{{ $item->is_gia }}"></td>
                                            <td class="item-name">{{ $loop->iteration }}</td>
                                            <td class="item-name"><input type="text" value="{{ $item->branch }}" name="branch[]" id="branch"></td>
                                            <td class="item-name">
                                                <input type="file" class="w-100 @if ($item->is_gia == 2) d-none @endif" name="gia_file[]" ><br>
                                                @if ($item->file)
                                                    <a href=" {{url('public/documents/'. $item->file)}}" target="_blank">See Attachment</a>
                                                @endif
                                            </td>
                                            <td class="description">
                                                <input type="hidden"  name="invoice_gia_id[]" value="{{$item->gia_id}}" />
                                                <input type="hidden" class="gia_type_val"  value="{{ $item->is_gia }}" name="gia_type[]" readonly />
                                                {{ $item->is_gia == 1 ? "Gia" : "No Gia" }}
                                            </td>
                                            {{-- <td class="description"><input type="hidden" value="{{ $item->is_gia }}" name="gia_type[]" readonly>  {{ $item->is_gia == 1 ? "Gia" : "No Gia" }}</td> --}}
                                            <td class="description"><input type="text" readonly value="{{$item->details}}" name="gia_details[]"></td>
                                            <td class="description"><input type="text" value="{{$item->remark}}" name="remark[]"></td>
                                            <td class="description"><input type="text" value="{{$item->pcs}}" name="pcs[]" id="pcs"></td>
                                            <td><input type="text" class="qty allownumericwithdecimal" value="{{$item->carat}}" name="carat[]" ></td>
                                            <td class="text-right"><input type="text" value="{{$item->unit_price}}" name="unit_price[]" class="cost allownumericwithdecimal"></td>
                                            <td><input type="text" class="return-carat allownumericwithdecimal" name="return_carat[]" value="{{$item->return_carat ?? 0}}"></td>
                                            <td><input type="text" class="sold-qty allownumericwithdecimal"  name="sold_carat[]" value="{{$item->sold_carat}}" readonly></td>
                                            <input type="hidden" name="final_amt[]" class="final_amt" value="{{$item->amount}}">
                                            <input type="hidden" name="sold_final_amt[]" class="sold_final_amt" value="{{$item->sold_amount}}">
                                            <input type="hidden"  name="gia_id[]" class="gia_id" value="{{$item->gia_id}}" />
                                            <input type="hidden"  class="inv_details_id" name="inv_details_id[]" value="{{$item->id}}" />
                                            <td class="text-center" name="amount"><span class="price">{{$item->amount}}</span></td>
                                            <td class="text-center" name="sold_amount"><span class="sold-price">{{$item->sold_amount}}</span></td>
                                        </tr>
                                        @endforeach
                                        {{-- Require extra <tr> when all entry remove because addRow depend upon item-row class  --}}
                                        <tr class="item-row">
                                        </tr>
                                    </tbody>
                                    <tr>
                                        <td colspan="10" class="blank"> </td>
                                        <td colspan="2" class="total-line">Subtotal :</td>
                                        <td class="total-value"><div id="subtotal">000.00</div></td>
                                        <td class="total-value"><div id="sold-subtotal">000.00</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" class="blank"> </td>
                                        <td colspan="2" class="total-line">Total :</td>
                                        <td class="total-value"><div id="total">000.00</div></td>
                                        <td class="total-value"><div id="sold-total">000.00</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" class="blank"> </td>
                                        <td colspan="2" class="total-line">Amount Paid :</td>
                                        <td class="total-value"><div id="paid">000.00</div></td>
                                        <td class="total-value"><div id="sold-paid">000.00</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="blank"> </td>
                                        <td colspan="1" class="total-line balance">Carat :</td>
                                        <td class="total-value balance"><div id="total-carat">00.00</div></td>
                                        <input type="hidden" name="carat_total" id="total-carat-value" value="">

                                        <td class="total-value balance"><div id="total-sold-carat">00.00</div></td>
                                        <input type="hidden" name="sold_carat_total" id="total-sold-carat-value" value="">

                                        <td colspan="3" class="total-line balance">Balance Due :</td>
                                        <td class="total-value balance"><div class="due">000.00</div></td>
                                        <input type="hidden" name="due_total" id="total-due-value" value="">

                                        <td class="total-value balance"><div class="sold-due">000.00</div></td>
                                        <input type="hidden" name="sold_due_total" id="total-sold-due-value" value="">
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="form-group-a">
                            @if ($invoice->is_final != 1)
                                {{-- <a class="btn btn-primary btn-sm" >Save</a> --}}
                                <input type="button" class="btn btn-primary btn-sm memo-btn1 memoBtn" value="Save" data-id="1">
                                <button type="button"  class="btn btn-primary btn-sm memoBtn" onclick="submitform()">Final Invoice</button>
                                <input class="memo-btn" type="submit" style="display: none"  data-id="2">
                                {{-- <input type="submit" class="btn btn-primary btn-sm memo-btn" value="Final Invoice" data-id="2"> --}}
                            @endif
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div> 
</div>
@stop
@section('script')
<script src="{{ URL::to('public/js/invoice_memo.js') }}"></script>

<script type="text/javascript">

function submitform() {

    $(".hide-fields").removeClass('d-none');
    $(".hide-fields").addClass('highlighted');
    setTimeout(function () {
        $('.highlighted').removeClass('highlighted');
    }, 5000);

  // Refer :  https://stackoverflow.com/questions/16707743/html5-validation-when-the-input-type-is-not-submit/31741546
  var f = document.getElementsByTagName('form')[0];
  if(f.checkValidity()) {
    // f.submit();
    $('.memo-btn').trigger('click');
  } else {
    var msg = '';
    if (document.getElementById('percentage').validationMessage) {
        swal(document.getElementById('percentage').validationMessage);
        msg = 'Please fill out percentage field.';
    } else if((document.getElementById('term').validationMessage)) {
        msg = 'Please fill out term field.';
    }
    swal(msg);
  }
}

$(document).ready(function() {
    var isFinal = "{{$invoice->is_final}}";
    if (isFinal == 1) {
        $(".form :input").prop("disabled", true);
    }
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
        $('#percentage').prop('required',false);
    });

    //Set 0 for retun carat and calculate total sold carat and sold amount (only when firt time update and load page)
    $(".return-carat").each(function(){
        updateSoldCarat($(this));
    });
    $(".return-carat").each(update_price);

    $(document).on('blur', '.return-carat', function (e) {
        var rCarat = $(this).closest("tr").find(".return-carat");
        if (!rCarat.val()) {
            rCarat.val(0);
        }
        updateSoldCarat($(this));
    });

    $(document).on('blur', ' .qty', function (e) {
        updateSoldCarat($(this));
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
            var inv_details_id = $(this).parents('.item-row').find('.inv_details_id').val();
            if (inv_details_id) {
                var mUrl = '{{URL::to("get-current-no-gia-carat-stock")}}/' + giaId + '/'+ inv_details_id;
            } else {
                var mUrl = '{{URL::to("get-current-no-gia-carat-stock")}}/' + giaId;
            }
            $(".memoBtn").prop("disabled",true);
            $.ajax({
                type: "GET",
                url: mUrl,
                success: function(response) {
                    // console.log(response);
                    if (response > 0) {
                        currentStock = parseFloat(response);
                        $(".memoBtn").prop("disabled",false);
                    }
                    if (currentStock < parseFloat(thisQty.val())) {
                        swal("Available carat : "  + currentStock);
                        thisQty.val(0);
                        thisQty.parents('.item-row').find('.sold-qty').val(0);
                    }
                    update_price2(thisQty);
                }
            });
        }
    });

    // $(".memo-second-form").submit(function(e) {
    $(".memo-btn, .memo-btn1").click(function(e) {
        var saveType = $(this).data('id');
        $(".btn").prop("disabled",true);
        e.preventDefault(); // avoid to execute the actual submit of the form.
        // var formData = $(".memo-btn, .memo-second-form").serialize();
        // var formData  = new FormData(this);
        var formData  = new FormData($(".memo-second-form")[0]);
        formData.append('date', $('input[name="date"]').val());
        formData.append('customer_id', $('select[name="customer_id"] option:selected').val());
        formData.append('reference', $('input[name="reference"]').val());
        formData.append('country', $('select[name="country"] option').filter(':selected').val());
        formData.append('single_unit_price', $('input[name="single_unit_price"]').val());
        formData.append('rate', $('input[name="rate"]').val());
        if (saveType == 2) {
            formData.append('is_final', 1);
            formData.append('l_invoice', "{{ str_pad($invoice->id, 8, '0', STR_PAD_LEFT) }}" );
            formData.append('e_invoice', "{{ str_pad($invoice->id, 8, '0', STR_PAD_LEFT) }}" );
            formData.append('is_broker', $('#is_broker').val());
            formData.append('percentage', $('input[name="percentage"]').val());
            formData.append('term', $('input[name="term"]').val());
            formData.append('duedate', $('input[name="duedate"]').val());
        }

        if ( $(".item-row").length <= 1) {
            swal("Please add gia details");
            $(".btn").prop("disabled",false);
            return false;
        }
        $.ajax({
            type: "POST",
            url:'{{URL::to("store-memo-details")}}',
            cache       : false,
            contentType : false,
            processData : false,
            data: formData, // serializes the form's elements.
            success: function(data) {
                if(data.status == true) {
                    window.location = '{{URL::to("memo")}}';
                } else {
                    swal("Something went wrong!", "", "error");
                    $(".btn").prop("disabled", false);
                }
            }
        });
    });
});

function updateSoldCarat(this1) {
    var caratQty = this1.closest("tr").find(".qty").val();
    var returnCarat = this1.closest("tr").find(".return-carat");
    this1.closest("tr").find(".sold-qty").val("");
    if (returnCarat.val() > parseFloat(caratQty)) {
        returnCarat.val(0);
    }
    if (returnCarat.val()) {
        var soldCarat = caratQty - returnCarat.val();
        var sCarat = roundNumber(soldCarat,2);
        this1.closest("tr").find(".sold-qty").val(sCarat);
    }
}

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

function removeInvoiceDetails(id) {
    $.ajax({
        type: "GET",
        url:'{{URL::to("delete-memo-details")}}/' + id,
        success: function(data) {
            if(data.status == true) {
            } else {
                swal("Something went wrong!", "", "error");
            }
        }
    });
}

</script>
@stop
