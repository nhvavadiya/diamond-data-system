@extends('templates.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body create-invoice">
                <h3>Create Invoice</h3>
                {{Form::open(['class' => 'form invoice-form','autocomplete' => 'off'])}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header table">
                            <input  value="1" name="inv_type" class="inv_type d-none" required/>
                            <tr>
                                <td class="meta-head">NO #</td>
                                <td> <input type="text"  value="{{$nextId}}" readonly name="no" onkeypress="isNumber(event);" required/></td>
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
                                <td class="meta-head">CUSTOMER</td>
                                <td colspan="3">
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
                        <table class="tbl-invoice-header sec table">
                            <tr>
                                <td class="meta-head">COUNTRY</td>
                                <td>
                                {{Form::select('country',$country,'1',['class'=>'add_customer_row','id'=>'country'])}}
                                    <!-- <select name="country" class="add_customer_row" id="country" required >
                                        @foreach ($country as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select> -->
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
                    {{Form::open([ 'url' => '/store-invoice', 'method' => 'post','class' => 'form invoice-second-form d-none'])}} 
                        <div class="row mt-4 text-right">
                            <div class="col-md-12">
                                <h3 class="float-left">Create Invoice details</h3>
                                <input type="hidden" value="" name="invoice_id" id="invoice_id">
                                <!-- <select class="add_gia_row-a" name="add_gia[]" id="add_gia" required>
                                    <option value="1">GIA</option>
                                    <option value="2">NO GIA </option>
                                </select> -->
                                <!-- <select class="add_gia_row-a" name="add_gia_details[]" id="add_gia_details"> -->
                                    {{-- <option>D-764</option>
                                    <option>AG-668</option>
                                    <option>AG-394</option>
                                    <option>G-827</option>
                                    <option>EX-905</option>
                                    <option>EX-819</option>
                                    <option>R-48</option> --}}
                                <!-- </select> -->
                                <!-- <button id="addrow" type="button" class="btn btn-success btn-rounded btn-icon">
                                    <i class="ti-plus"></i>
                                </button> -->
                                <!-- <button type="button" class="btn btn-danger btn-rounded btn-icon delete-row">
                                    <i class="ti-minus"></i>
                                </button> -->
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
                                    <tbody class="invoice-row">
                                        <tr class="item-row">
                                            <td class="item-name text-center">
                                                <!-- <input type="checkbox" name="record"> -->
                                                <a id="addrow" class="addinvoiceRow">
                                                    <i class="ti-plus text-success"></i>
                                                </a>
                                            </td>
                                            <td class="item-name">1</td>
                                            <td class="item-name">
                                                <!-- <input type="text" value="111" name="branch" id="branch"> -->
                                                {{Form::select('branch[]', $branch,'',['id'=>'branch','class'=>'select-branch','placeholder'=>'select branch'])}}    
                                            </td>
                                            <td class="description">
                                                <select class="select-gia" name="gia_type[]" id="add_gia">
                                                    <option value="">select</option>
                                                    <option value="1">GIA</option>
                                                    <option value="2">NO GIA</option>
                                                </select>
                                                <!-- <input type="text" value="" name="is_gia"> -->
                                            </td>
                                            <td class="description">
                                            <!-- <input type="text" value="" name="details"> -->
                                                <select name="gia_details[]" id="details" class="gia-value">
                                                    <option value="">Select</option>
                                                </select>
                                            </td>
                                            <td class="description"><input type="text" value="" name="pcs[]" id="pcs" class="pcs"></td>
                                            <td><input type="text" class="qty" value="" name="carat[]" id="carat"></td>
                                            <td class="text-right"><input type="text" class="cost" value="" name="unit_price[]"></td>
                                            <input type="hidden" name="final_amt[]" class="final_amt" value="0">
                                            <input type="hidden" name="gia_id[]" class="gia_id" value="">
                                            <td class="text-right" name="amount" class="amount"><span class="price"></span></td>
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
                            {{-- <input type="submit" class="btn btn-primary btn-sm invoice-details-form-save" value="Save"> --}}
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
var i=2; 
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
    
    // $('#add_gia').on('change',function() {
    //     var giaType = this.value;
    //     getGiaAndNoGiaValues(giaType);
    // });

     $('.select-gia').on('change',function() {
        var giaType = $(this).val();
        getGiaAndNoGiaValues(giaType);
    });
    
    $(".invoice-form").submit(function(e) {
        $('.primary-form-save').prop("disabled",true);
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        // var url = form.attr('action');
        $.ajax({
            type: "POST",
            url:'{{URL::to("store-invoice")}}',
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
    
    $(".invoice-details-form-save").click(function(e) {
        var formSaveType = $(this).attr("data-id");
        $(".delete-row").prop("disabled",true);
        $(".invoice-details-form-save").prop("disabled",true);
        e.preventDefault(); // avoid to execute the actual submit of the form.
        // var form = $(this);
        // var form2 = $(".invoice-form");
        var dataString = $(".invoice-form, .invoice-second-form").serialize();


        var pcs = $(".invoice-row .item-row:last-child").find('.pcs').val();
        var qty = $(".invoice-row .item-row:last-child").find('.qty').val();
        var cost = $(".invoice-row .item-row:last-child").find('.cost').val(); 
        var giavalue = $(".invoice-row .item-row:last-child").find('.gia-value').val(); 
        
        var j =0;

        if(pcs == '') {
            j=1;
        }

        if(qty == '') {
            j=1;
        }

        if(cost == '') {
            j=1;
        }
        if(giavalue == '') {
            j=1;
        }

        // alert($(".item-row").length);
        // return false;
        // if ( $(".item-row").length <= 1) {
        if(j == 1) {
            swal("Please add gia details");
            $(".invoice-details-form-save").prop("disabled",false);
            $(".delete-row").prop("disabled", false);
            return false;
        } else {
            $.ajax({
                type: "POST",
                url:'{{URL::to("store-invoice-details")}}',
                data: dataString, // serializes the form's elements.
                success: function(data) {
                    if(data.status == true) {
                        swal("Add details successfully!", "", "success");
                        $(".delete-row").prop("disabled",true);
                        $("#addrow").prop("disabled",true);
                        if (formSaveType == 1) {
                            window.location = '{{URL::to("invoice-details-print")}}/' + data.id;
                        }
                    } else {
                        swal("Something went wrong!", "", "error");
                        $(".invoice-details-form-save").prop("disabled",false);
                    }
                }
            });
        }
       
    });

   
    $("#addrow").click(function(){
        var pcs = $(".invoice-row .item-row:last-child").find('.pcs').val();
        var qty = $(".invoice-row .item-row:last-child").find('.qty').val();
        var cost = $(".invoice-row .item-row:last-child").find('.cost').val(); 
        var j =0;

        if(pcs == '') {
            j=1;
        }
        
        if(qty == '') {
            j=1;
        }
        
        if(cost == '') {
            j=1;
        }

        if(j==1) {
            return false;
        } else {
            var tr = $("<tr class='item-row' />");  
            tr.html(invoiceRowAppend(""));  
            $(".invoice-row").append(tr);
            i++;
            getBranch();
        }
      
    });

 
});

$(document).on('change','.select-branch', function() {
        var branch = $(this).val();
        // alert(branch);
        $(this).closest(".item-row").find('.select-gia').val('');
        if(branch != '') {
            $(this).closest(".item-row").find('.select-gia').val(1);
        } else {
            $(this).closest(".item-row").find('.select-gia').val('');
        }

        var giaid =  $(this).closest(".item-row").find('.select-gia').val();
        $(this).closest(".item-row").find('.gia_id').val(giaid);

        var giaType = $(this).closest(".item-row").find('.select-gia').val();
        getGiaAndNoGiaValues(giaType);
    });

$(document).on('change','.select-gia', function() {
    var giaType = $(this).val();
    var giaid =  $(this).closest(".item-row").find('.select-gia').val();
    $(this).closest(".item-row").find('.gia_id').val(giaid);
    getGiaAndNoGiaValues(giaType);
});
$(document).on('click','.deleterow', function () {  
    $(this).closest(".item-row").remove();  
});

function invoiceRowAppend() {
    var text = ''; 
    text += '<td class="item-name text-center"> ';
    text += '<a id="deleterow" class="deleterow">';
    text += '<i class="ti-minus text-danger"></i>';
    text += '</a></td>';
    text += '<td class="item-name"> '+ i +'</td>';
    text += '<td class="item-name">';
    text += '<select name="branch[]" id="branch" class="branch_list select-branch"></select>';
    text += '</td>';
    text += '<td class="description">';
    text += '<select class="select-gia" name="gia_type[]" id="add_gia">';
    text += '<option value="">select</option>';
    text += '<option value="1">GIA</option>';
    text += '<option value="2">NO GIA</option>';
    text += '</select>';
    text += '</td>';
    text += '<td class="description">';
    text += '<select name="gia_details[]" class="gia-value" readonly value=""></select></td>';
    text += '<td class="description"><input type="text" name="pcs[]" required value="" class="pcs"></td>';
    text += '<td><input type="text" class="qty allownumericwithdecimal" name="carat[]" required value=""></td>';
    text += '<td class="text-right"><input type="text" name="unit_price[]"  required class="cost allownumericwithdecimal" value="00"></td>';
    text += '<input type="hidden" name="final_amt[]" class="final_amt" value="0">';
    text += '<input type="hidden" name="gia_id[]" class="gia_id" value="">';
    text += '<td class="text-right"><span class="price"">00.00</span></td>';
    text += '</tr>';
    return text; 
}

function getBranch() {
    $.ajax({
        type: "GET",
        url:'{{URL::to("getbranch")}}',
        success: function(data) {
            var branch = data.branch;
            if(data.status == 'true') {
                var option = '';
                option += '<option value="">select branch</option>';
                $.each(branch, function (key, index) {
                    option += '<option value="'+index.id+'">'+index.name+'</option>';
                    // reportData += index.reportname+', ';
                });
                
                $(".invoice-row .item-row:last-child").find('.branch_list').html(option);
            } else {
              
            }
        }
    });
}

function getGiaAndNoGiaValues(giaType) {
    if (giaType) {
        $.ajax({
            type: "GET",
            url:'{{URL::to("gia-type-details")}}/' + giaType,
            // data: {type : giaType}
            success: function(response) {
                if(response.status == true) {
                    var giavalue = '';
                    giavalue += '<option value="">Select</option>';
                    $.each(response.data, function( index, value ) {
                       
                        if (giaType == 1) {
                            var mixValue = value.stock + ' ' +value.fancy_color_intensity + ' ' + value.fancy_color_overtone + ' ' + value.fancy_color + ' ' + value.shape + ' ' + value.weight + ' ' +value.clarity;
                            giavalue += '<option data-id="'+value.id+'" data-type="1" value="'+ mixValue+'">'+ value.stock +'</option>';
                        }
                        if (giaType == 2) {
                            giavalue += '<option data-id="'+value.id+'" data-type="2" data-pcs="'+value.pc+'" data-carat="'+value.carat+'">'+ value.details +'</option>';
                        }
                    });
                    
                    $(".invoice-row .item-row:last-child").find('.gia-value').html(giavalue);
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
