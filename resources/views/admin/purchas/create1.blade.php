@extends('templates.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body create-invoice">
                <h3>Create purchas</h3>
                {{Form::open(['class' => 'form purchas-form','autocomplete' => 'off'])}}
                
                <div class="row mt-4">
                   
                    <div class="col-md-6">
                        <table class="tbl-invoice-header w-auto" >
                            <input  value="2" name="inv_type" class="inv_type d-none" required/>
                            <tr>
                                <td class="meta-head">NO #</td>
                                <td> <input type="text"  value="" name="no" onkeypress="javascript:return isNumber(event)" required/></td>
                            </tr>
                            <tr>
                                <td class="meta-head">L INV NO #</td>
                                <td><input type="text"  value="" name="l_invoice" onkeypress="return ValidateAlpha(event)" required/></td>
                              
                               
                            </tr>
                            <tr>
                                <td class="meta-head">E INV NO #</td>
                                <td><input type="text"  value="" name="e_invoice" onkeypress="return ValidateAlpha(event)" required/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-invoice-header sec w-auto" >
                            <tr>
                                <td class="meta-head">DATE</td>
                                <td>  {{\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y')}}</td>
                            </tr>
                            <tr>
                                <td class="meta-head">TERM</td>
                                <td> <input type="text" value=""  name="term" ></td>
                               
                            </tr>
                            <tr>
                                <td class="meta-head">DUE DATE</td>
                                <td><input type="text" value=""  name="duedate"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="table-responsive active">
                        <table class="tbl-invoice-header customer "> 
                                <td class="meta-head">CUSTOMER</td>
                                <td colspan="3"> <select name="customer_id" class="add_customer_row" id="customer_id" >
                                    <option value=""></option>
                                    <option value="1">Hardik</option>
                                    <option value="2">Jivani</option>
                                  </select></td>
                            </tr>
                            <tr>
                                <td class="meta-head">REFERENCE</td>
                                <td colspan="3"><input type="text" value=""  name="reference" required/></td>
                            </tr>
                            <tr>
                                <td class="meta-head">BROKER</td>
                                <td ><select  name="is_broker" id="is_broker" class="add_broker">
                                  <option value="1">YES</option>
                                  <option value="2">NO</option>
                                </select></td>
                                <td class="meta-head">PERCENTAGE</td>
                                <td><input type="text" value=""   name="percentage" required/></td>
                                
                            </tr>
                        </table>
                    </div>
                    </div>
                    <div class="col-md-6">

                        <table class="tbl-invoice-header sec w-auto">
                            <tr>
                                <td class="meta-head">COUNTRY</td>
                                <td> <select name="country" class="add_customer_row" id="country" >
                                    <option value=""></option>
                                    <option value="usa">USA</option>
                                    <option value="china">CHINA</option>
                                    <option value="india">INDIA</option>
                                  </select></td>

                            </tr>
                            <tr>
                                <td class="meta-head">UNIT PRICE</td>
                                <td><input type="text" value=""  name="unit_price" onkeypress="javascript:return isNumber(event)"required/></td>  
                            </tr>
                            <tr>
                                <td class="meta-head">RATE</td>
                                <td><input type="text" value=""   name="rate" onkeypress="javascript:return isNumber(event)"required/></td> 
                            </tr>
                        </table>
                        
                    </div>
                </div>
                <div class="form-group-a" >
                  <a onclick="getSubmit()"class="btn btn-primary btn-sm" >Save</a>
                </div>
                {{ Form::close() }}
       
    
     <div id="contact_form" >
         {{Form::open([ 'url' => '/store-purchas', 'method' => 'post','class' => 'form purchas-second-form d-none  '])}} 
                <div class="row mt-4 text-right">
                  
                    <div class="col-md-12">
                      <tr>
  
                      <select class="add_gia_row-a" name="add_gia" id="add_gia">
                        <option value="1">GIA</option>
                        <option value="2">NO GIA </option>
                      </select> </tr>
                     
                      <select class="add_gia_row-a" name="add_gia_details" id="add_gia_details">
                        <option>D-764</option>
                        <option>AG-668</option>
                        <option>AG-394</option>
                        <option>G-827</option>
                        <option>EX-905</option>
                        <option>EX-819</option>
                        <option>R-48</option>
                      </select>
                       <button id="addrow" type="button" class="btn btn-success btn-rounded btn-icon">
                            <i class="ti-plus"></i>
                        </button> <button type="button" class="btn btn-danger btn-rounded btn-icon delete-row">
                            <i class="ti-minus"></i>
                        </button></div>
                </div>
                <div class="row">
                    <div class="table-responsive active">  
                    <div class="col-md-12">
                        <table id="items">
                            <tr>
                                <th></th>
                                <th>NO</th>
                                <th>BRANCH</th>
                                <th>GIA/NO GIA</th>
                                <th>DETAILS</th>
                                <th>PCS</th>
                                <th>CARAT</th>
                                <th>UNIT PRICE</th>
                                <th>AMOUNT</th>
                            </tr>
                           <tbody>
                            <tr class="item-row d-none">
                                <td class="item-name text-center"><input type="checkbox" name="record"></td>
                                <td class="item-name"><input type="text" value="" name="no"></td>
                                <td class="item-name"><input type="text" value="" name="branch"></td>
                                <td class="description"><input type="text" value="" name="is_gia"></td>
                                <td class="description"><input type="text" value="" name="details"></td>
                                <td class="description"><input type="text" value="" name="pcs"></td>
                                <td><input type="text" class="qty" value="" name="carat"></td>
                                <td class="text-right"><input type="text" class="cost" value="" name="unit_price"></td>
                                <td class="text-right" name="amount"><span class="price"></span></td>
                            </tr>
                        </tbody>          
                            <tr>                           
                                <td colspan="6" class="blank"> </td>
                                <td colspan="2" class="total-line">Subtotal :</td>
                                <td class="total-value"><div id="subtotal">$000.00</div></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="blank"> </td>
                                <td colspan="2" class="total-line">Total :</td>
                                <td class="total-value"><div id="total">$000.00</div></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="blank"> </td>
                                <td colspan="2" class="total-line">Amount Paid :</td>
                                <td class="total-value"><div id="paid">$000.00</div></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="blank"> </td>
                                <td colspan="2" class="total-line balance">Balance Due :</td>
                                <td class="total-value balance"><div class="due">$000.00</div></td>               
                            </tr>                       
                        </table>
                    </div>                                                                                            
                </div>                 
                </div>                                              
                <div class="form-group-a" >                                          
                    <a class="btn btn-primary btn-sm" >Save</a>
                  </div>
                {{ Form::close() }}
              </div>
            </div>
        </div>    
</div>
@stop
@section('script')
<script type="text/javascript">
 function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
  function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
$('select[name="add_gia"]').on('change',function()
{
  $('select[name="add_gia_details"]').attr('disabled',this.value!="1")
});
function getSubmit() {
  // alert('hii');
  var formdata = $('.purchas-form').serialize();

            $.ajax({
               type:'POST',
               url:'{{URL::to("store-purchas")}}',
               data:formdata,
               dataType: 'json',
               success:function(data) {
                 if(data.status == 'true') {
$('.purchas-second-form').removeClass('d-none');
                 }
                  // $("#contact_form").html(data);
               }
            });
         }
 </script>
@stop
