@extends('templates.master')
@section('content')
<div class="row clearfix data-table">
    <div class="col-md-12">
        <div class="card">
            <div class="tab-content m-t-10">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>
                            <strong>Customer</strong>
                        </h3>
                    </div>
                        
                        <div class="modal fade bd-example-modal-lg" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title w-100 font-weight-bold">Add Customer</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body mx-1">
                              {{Form::open(['url' => '/store-customer', 'method' => 'post','autocomplete' => 'off', 'class' => 'form customer-form'])}}
                        
                               <div class="row">
                                   <div class="col-md-6 ">
                                      <table class="tbl-purchas-header ">
                                           <tr>
                                               <td class="meta-head">SURNAME</td>
                                               <td>{{ Form::text('surname', null, [ 'class' => 'form-control surname form-control-sm','required'])}}</td>
                                               <span class="error text-danger">
                                                 {{$errors->first('surname')}}
                                               </span>
                                            </tr>
                                      </table>
                                   </div>
                                   <div class="col-md-6">
                                       <table class="tbl-purchas-header ">
                                            <tr>
                                               <td class="meta-head">NAME</td>
                                               <td>{{ Form::text('name', null, ['class' => 'form-control name form-control-sm', 'required'])}}</td>
                                               <span class="error text-danger">
                                                 {{$errors->first('name')}}
                                               </span>
                                            </tr>
                                        </table>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-6">
                                       <table class="tbl-purchas-header ">
                                           <tr>
                                               <td class="meta-head">E-MAIL</td>
                                               <td>{{ Form::text('email', null, ['class' => 'form-control email form-control-sm', 'required'])}}</td>
                                               <span class="error text-danger">
                                                  {{$errors->first('email')}}
                                               </span>
                                           </tr>
                                       </table>
                                  </div>
                                  <div class="col-md-6">
                                       <table class="tbl-purchas-header ">
                                           <tr>
                                               <td class="meta-head">MOBILE</td>
                                              <td>{{ Form::text('mobile', null, [ 'class' => 'form-control mobile form-control-sm','autocomplete' => 'off', 'oninput' => 'checkMobile(this.value)', 'maxlength' => 10,'required' ])}}</td>
                                              <span class="error text-danger">
                                               {{$errors->first('mobile')}}
                                             </span>
                                          </tr>
                                       </table>
                                   </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">GENDER</td>
                                                <td>{{ Form::select('gender',[1 => 'Male', 2 => 'Female'], null, ['class' => 'form-control gender form-control-sm', 'placeholder' => 'Select Gender', 'required' ])}}</td>
                                                <span class="error text-danger">
                                                    {{$errors->first('gender')}}
                                                </span>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">BIRTH DATE</td>
                                                 <td>{{ Form::text('date_of_birth', null, [ 'class' => 'form-control date_of_birth form-control-sm','required', 'autocomplete' => 'off' ])}}</td>
                                                 <span class="error text-danger">
                                                    {{$errors->first('date_of_birth')}}
                                                 </span>
                                            </tr>
                                       </table>
                                   </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">POSITION</td>
                                                <td>{{ Form::text('position', null, ['class' => 'form-control position form-control-sm','maxlength' => 50 ])}}</td>
                                                <span class="error text-danger">
                                                    {{$errors->first('position')}}
                                                </span>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">REFERENCE</td>
                                                 <td>{{ Form::text('reference', null, [ 'class' => 'form-control reference form-control-sm'])}}</td>
                                                 <span class="error text-danger">
                                                    {{$errors->first('reference')}}
                                                 </span>
                                            </tr>
                                       </table>
                                   </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-12">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">ADDRESS</td>
                                                <td>{{ Form::textarea('address', null, ['class' => 'form-control address form-control-sm','rows' => 3 , 'required' ])}}</td>
                                                <span class="error text-danger">
                                                    {{$errors->first('address')}}
                                                 </span>
                                            </tr>
                                       </table>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-md-6">
                                       <table class="tbl-purchas-header ">
                                           <tr>
                                               <td class="meta-head">WHATSAPP</td>
                                               <td>{{ Form::text('whatsapp', null, ['class' => 'form-control whatsapp form-control-sm','maxlength' => 10, 'oninput' => 'checkWhatsApp(this.value)',])}}</td>
                                               <span class="error text-danger">
                                                   {{$errors->first('whatsapp')}}
                                               </span>
                                           </tr>
                                       </table>
                                   </div>
                                   <div class="col-md-6">
                                        <table class="tbl-purchas-header ">
                                            <tr>
                                                <td class="meta-head">OTHER MOBILE</td>
                                                <td>{{ Form::text('other_mobile', null, ['class' => 'form-control other_mobile form-control-sm', 'autocomplete' => 'off','oninput' => 'checkOtherMobile(this.value)','maxlength' => 15,'minlength' => 10,])}}</td>
                                                <span class="error text-danger">
                                                    {{$errors->first('other_mobile')}}
                                                 </span>
                                            </tr>
                                       </table>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-md-6">
                                       <table class="tbl-purchas-header ">
                                           <tr>
                                               <td class="meta-head">COMPANY NAME</td>
                                               <td>{{ Form::text('company_name', null, ['class' => 'form-control company_name form-control-sm','maxlength' => 50])}}</td>
                                               <span class="error text-danger">
                                                   {{$errors->first('company_name')}}
                                               </span>
                                           </tr>
                                       </table>
                                   </div>
                                   <div class="col-md-6">
                                       <table class="tbl-purchas-header ">
                                           <tr>
                                               <td class="meta-head">CONTACT PERSON</td>
                                               <td>{{ Form::text('contact_person', null, ['class' => 'form-control contact_person form-control-sm', 'maxlength' => 50])}}</td>
                                               <span class="error text-danger">
                                                {{$errors->first('other_mobile')}}
                                                </span>
                                            </tr>
                                       </table>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">RAPNET ID</td>
                                            <td>{{ Form::text('rapnet_id', null, ['class' => 'form-control rapnet_id form-control-sm', 'maxlength' => 10, 'oninput' => 'checkRapNetId(this.value)', ])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('company_name')}}
                                            </span>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">FAX</td>
                                            <td>{{ Form::text('fax', null, [ 'class' => 'form-control fax form-control-sm'])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('fax')}}
                                                </span>
                                            </tr>
                                       </table>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">CHAT</td>
                                            <td>{{ Form::text('chat', null, [ 'class' => 'form-control chat form-control-sm'])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('chat')}}
                                            </span>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">SKYPE</td>
                                            <td>{{ Form::text('skype', null, [ 'class' => 'form-control skype form-control-sm'])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('skype')}}
                                            </span>
                                            </tr>
                                       </table>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">WEBSITE</td>
                                            <td>{{ Form::text('website', null, [ 'class' => 'form-control website form-control-sm','maxlength' => 100,'oninput' => 'checkRapNetId(this.value)',])}}</td>
                                            <span class="error text-danger">
                                                {{$errors->first('website')}}
                                            </span>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">REMARK</td>
                                           <td>{{ Form::text('remark', null, ['class' => 'form-control remark form-control-sm' ])}}</td>
                                           <span class="error text-danger">
                                            {{$errors->first('skype')}}
                                            </span>
                                        </tr>
                                   </table>
                              </div>
                          </div>
                        </div>
                              <div class="modal-footer d-flex justify">
                                <button class="btn btn-danger btn-sm">submit</button>
                                <button class="btn btn-light btn-sm" data-dismiss="modal">Cancel</a>
                              </div>
                              {{ Form::close() }}
              
                            </div>
                          </div>
                        </div>
                </div>

                <div class="body">
                    <!-- Nav tabs -->
                    
                        <div class="col-md-12">
                            <div class="row mt-3">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <ul class="nav nav-tabs padding-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <span class="input-group-addon search-border">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                          
                                        </div>
                                    </ul>
                                    
                                </div>
                               
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                   <!--<div class="input-group"><input type="text" class="form-control daterange" autocomplete="off" placeholder="Select Date">
                                    </div>-->
                                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalRegisterForm">Add</button>

                                </div>
                            </div>
                        </div>
                 
                    <!-- Tab panes -->
                    <div class="tab-content m-t-10">

                        <!-- notification -->
                        @if(Session::has('msg'))
                            <div class="alert alert-success notification">
                                <strong>Success!</strong> {{Session::get('msg')}}
                               
                            </div>
                        @endif

                        <div class="customer-data table-responsive active">
                        
                        </div>
                    </div>
                    <!--edit-->
                    <div class="modal fade bd-example-modal-lg" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title w-100 font-weight-bold">Edit Customer </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body mx-1">
                              {{Form::open(['url' => '/update-customer', 'method' => 'post', 'class' => 'form customer-form'])}}
                        
                              <div class="row">
                                <div class="col-md-6 ">
                                   <table class="tbl-purchas-header ">
                                        <tr>
                                            <td class="meta-head">SURNAME</td>
                                            <td>{{ Form::text('surname', null, [ 'class' => 'form-control surname-edit form-control-sm','placeholder' => 'Surname','required','id' => 'surname-edit'])}}</td> 
                                             <span class="error text-danger">
                                              {{$errors->first('surname')}}
                                            </span>
                                        </tr>
                                  </table>
                               </div>
                               <div class="col-md-6">
                                   <table class="tbl-purchas-header ">
                                        <tr>
                                       <td class="meta-head">NAME</td>
                                       <td>{{ Form::text('name', null, ['class' => 'form-control name-edit form-control-sm', 'placeholder' => 'Name', 'required','id' => 'name-edit'])}}</td> 
                                       <span class="error text-danger">
                                        {{$errors->first('name')}}
                                      </span>
                                   </tr>
                               </table>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <table class="tbl-purchas-header ">
                                  <tr>
                                      <td class="meta-head">E-MAIL</td>
                                      <td>{{ Form::text('email', null, ['class' => 'form-control email-edit form-control-sm','placeholder' => 'Email', 'required','id' => 'email-edit'])}}</td> 
                                      <span class="error text-danger">
                                        {{$errors->first('email')}}
                                     </span>
                                 </tr>
                             </table>
                        </div>
                        <div class="col-md-6">
                             <table class="tbl-purchas-header ">
                                 <tr>
                                     <td class="meta-head">MOBILE</td>
                                     <td>{{ Form::text('mobile', null, [ 'class' => 'form-control mobile-edit form-control-sm', 'placeholder' => 'Mobile','autocomplete' => 'off', 'oninput' => 'checkMobile(this.value)', 'maxlength' => 10,'required','id' => 'mobile-edit'])}}</td> 
                                <span class="error text-danger">
                                    {{$errors->first('mobile')}}
                                  </span>
                               </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                             <table class="tbl-purchas-header ">
                                 <tr>
                                     <td class="meta-head">GENDER</td>
                                     <td>{{ Form::select('gender',[1 => 'Male', 2 => 'Female'], null, ['class' => 'form-control gender-edit form-control-sm', 'placeholder' => 'Select Gender', 'required','id' =>'gender-edit' ])}}</td> 
                                   <span class="error text-danger">
                                    {{$errors->first('gender')}}
                                </span>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-purchas-header ">
                            <tr>
                                <td class="meta-head">BIRTH DATE</td>
                                <td>{{ Form::text('date_of_birth', null, [ 'class' => 'form-control date_of_birth-edit form-control-sm','placeholder' => 'Date of Birth','required', 'autocomplete' => 'off','id' => 'date_of_birth-edit' ])}}</td> 
                                <span class="error text-danger">
                                    {{$errors->first('date_of_birth')}}
                                 </span>
                            </tr>
                       </table>
                   </div>
               </div>
               <div class="row">
                    <div class="col-md-6">
                        <table class="tbl-purchas-header ">
                            <tr>
                                <td class="meta-head">POSITION</td>
                                <td>{{ Form::text('position', null, ['class' => 'form-control position-edit form-control-sm','placeholder' => 'Position','maxlength' => 50,'id' => 'position-edit'])}}</td> 
                                <span class="error text-danger">
                                    {{$errors->first('position')}}
                                </span>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-purchas-header ">
                            <tr>
                                <td class="meta-head">REFERENCE</td>
                                <td>{{ Form::text('reference', null, [ 'class' => 'form-control reference-edit form-control-sm', 'placeholder' => 'Reference','id' => 'reference-edit'])}}</td> 
                                <span class="error text-danger">
                                    {{$errors->first('reference')}}
                                 </span>
                            </tr>
                       </table>
                   </div>
               </div>
               <div class="row">
                    <div class="col-md-12">
                        <table class="tbl-purchas-header ">
                            <tr>
                                <td class="meta-head">ADDRESS</td>
                                <td>{{ Form::textarea('address', null, ['class' => 'form-control address-edit form-control-sm','rows' => 3 , 'placeholder' => 'Address', 'required','id' => 'address-edit'])}}</td> 
                               <span class="error text-danger">
                                   {{$errors->first('address')}}
                                </span>
                           </tr>
                      </table>
                  </div>
             </div>
             <div class="row">
                  <div class="col-md-6">
                      <table class="tbl-purchas-header ">
                          <tr>
                              <td class="meta-head">WHATSAPP</td>
                              <td> {{ Form::text('whatsapp', null, ['class' => 'form-control whatsapp-edit form-control-sm',  'placeholder' => 'Whats App','maxlength' => 10, 'oninput' => 'checkWhatsApp(this.value)','id' => 'whatsapp-edit'])}}</td> 
                                <span class="error text-danger">
                                    {{$errors->first('whatsapp')}}
                                </span>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                         <table class="tbl-purchas-header ">
                             <tr>
                                 <td class="meta-head">OTHER MOBILE</td>
                                 <td>{{ Form::text('other_mobile', null, ['class' => 'form-control other_mobile-edit form-control-sm','placeholder' => 'Other Mobile', 'autocomplete' => 'off','oninput' => 'checkOtherMobile(this.value)','maxlength' => 15,'minlength' => 10,'id' => 'other_mobile-edit'])}}</td> 
                                <span class="error text-danger">
                                    {{$errors->first('other_mobile')}}
                                 </span>
                            </tr>
                       </table>
                   </div>
              </div>
              <div class="row">
                   <div class="col-md-6">
                       <table class="tbl-purchas-header ">
                           <tr>
                               <td class="meta-head">COMPANY NAME</td>
                               <td>{{ Form::text('company_name', null, ['class' => 'form-control company_name-edit form-control-sm','placeholder' => 'Company Name','maxlength' => 50,'id' => 'company_name-edit'])}}</td> 
                                 <span class="error text-danger">
                                    {{$errors->first('company_name')}}
                                </span>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-purchas-header ">
                            <tr>
                                <td class="meta-head">CONTACT PERSON</td>
                                <td>{{ Form::text('contact_person', null, ['class' => 'form-control contact_person-edit form-control-sm', 'placeholder' => 'Contact Person', 'maxlength' => 50,'id' => 'contact_person-edit'])}}</td> 
                               <span class="error text-danger">
                                {{$errors->first('other_mobile')}}
                                </span>
                            </tr>
                       </table>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <table class="tbl-purchas-header ">
                        <tr>
                            <td class="meta-head">RAPNET ID</td>
                            <td>{{ Form::text('rapnet_id', null, ['class' => 'form-control rapnet_id-edit form-control-sm','placeholder' => 'Rapnet Id', 'maxlength' => 10, 'oninput' => 'checkRapNetId(this.value)','id' => 'rapnet_id-edit' ])}}</td> 
                                <span class="error text-danger">
                                    {{$errors->first('company_name')}}
                                </span>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-purchas-header ">
                            <tr>
                                <td class="meta-head">FAX</td>
                                <td> {{ Form::text('fax', null, [ 'class' => 'form-control fax-edit form-control-sm', 'placeholder' => 'Fax','id' => 'fax-edit'])}}</td> 
                                <span class="error text-danger">
                                    {{$errors->first('fax')}}
                                    </span>
                                </tr>
                           </table>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <table class="tbl-purchas-header ">
                            <tr>
                                <td class="meta-head">CHAT</td>
                                <td>{{ Form::text('chat', null, [ 'class' => 'form-control chat-edit form-control-sm','placeholder' => 'chat','id' => 'chat-edit'])}}</td> 
                            <span class="error text-danger">
                                {{$errors->first('chat')}}
                            </span>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="tbl-purchas-header ">
                        <tr>
                            <td class="meta-head">SKYPE</td>
                            <td>{{ Form::text('skype', null, [ 'class' => 'form-control skype-edit form-control-sm', 'placeholder' => 'Skype','id' => 'skype-edit'])}}</td> 
                            <span class="error text-danger">
                                {{$errors->first('skype')}}
                            </span>
                            </tr>
                       </table>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <table class="tbl-purchas-header ">
                        <tr>
                            <td class="meta-head">WEBSITE</td>
                            <td>{{ Form::text('website', null, [ 'class' => 'form-control website-edit form-control-sm','placeholder' => 'Website', 'maxlength' => 100,'oninput' => 'checkRapNetId(this.value)','id' => 'website-edit'])}}</td> 
                            <span class="error text-danger">
                                {{$errors->first('website')}}
                            </span>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="tbl-purchas-header ">
                        <tr>
                            <td class="meta-head">REMARK</td>
                            <td>{{ Form::text('remark', null, ['class' => 'form-control remark-edit form-control-sm', 'placeholder' => 'Remark','id' => 'remark-edit'])}}</td> 
                            <span class="error text-danger">
                                {{$errors->first('skype')}}
                                </span>
                            </tr>
                       </table>
                  </div>
              </div>
            </div>
                              <div class="modal-footer d-flex justify">
                              {{ Form::hidden('customer_id', null, ['class' => 'form-control','id'=>'customer_id'])}}
                                <button class="btn btn-danger btn-sm">submit</button>
                                <a href="{{URL::to('/customer')}}"class="btn btn-light btn-sm">Cancel</a>
                              </div>
                              {{ Form::close() }}
              
                            </div>
                          </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
        var page = '';
        var search = '';
        var customerId = '';
 
        var fromdate = moment(new Date()).format('YYYY-MM-DD');
        var todate = moment(new Date()).format('YYYY-MM-DD');
        var qstring = 'fromdate=' + fromdate + '&todate=' + todate;

        $(document).ready(function(){

           // $('.daterange').daterangepicker({
           //     locale: {
           //         direction: 'drop-down-date-range',
           //         cancelLabel: 'Clear',
           //         format: 'D/M/Y'
           //     }
           // });
           // $('.daterange').on('apply.daterangepicker', function(ev, picker) {

           //     fromdate = picker.startDate.format('YYYY-MM-DD');
           //     todate = picker.endDate.format('YYYY-MM-DD');
           //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
           //     getCustomerData(qstring);
           // });
           // $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
           //     $(".daterange").val('');
           //     fromdate = '';
           //     todate = '';
           //     qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
           //     getCustomerData(qstring);
           // });
            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getCustomerData(qstring);
            });
            $(document).on('click','.delete-customer',function(){
                customerId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search+'&fromdate='+fromdate+ '&todate=' + todate;
                getCustomerData(qstring);
            });
        });
        $(document).on('dblclick', '#customer-table tbody tr', function(event) {
            var customerId = $(this).data('id');
            if(typeof(customerId) !== 'undefined'){
                var url = 'customer/'+customerId+'/edit';
                $.ajax({
                        headers: {                              
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{URL::to('get-customer-data')}}",
                        type: "POST",
                        data: {customerId:customerId, "_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                            }).done(function(data) {
                            // if(data.purchaserData != null){
                                $('#customer_id').val(customerId);
                                $('#surname-edit').val(data.customerData.surname);
                                $('#name-edit').val(data.customerData.name);
                                $('#email-edit').val(data.customerData.email);
                                $('#date_of_birth-edit').val(data.customerData.date_of_birth);
                                $('#reference-edit').val(data.customerData.reference);
                                $('#address-edit').val(data.customerData.address);
                                $('#mobile-edit').val(data.customerData.mobile);
                                $('#other_mobile-edit').val(data.customerData.other_mobile);
                                $('#fax-edit').val(data.customerData.fax);
                                $('#chat-edit').val(data.customerData.chat);
                                $('#skype-edit').val(data.customerData.skype);
                                $('#rapnet_id-edit').val(data.customerData.rapnet_id);
                                $('#website-edit').val(data.customerData.website);
                                $('#whatsapp-edit').val(data.customerData.whatsapp);
                                $('#remark-edit').val(data.customerData.remark);
                                $('#company_name-edit').val(data.customerData.company_name);
                                $('#contact_person-edit').val(data.customerData.contact_person);
                                $('#gender-edit').val(data.customerData.gender);
                                $('#position-edit').val(data.customerData.position);
                              
                            // }
                    }).fail(function(error) {

                    });
                    $('#modalEditForm').modal('show');
               
            }
        });

        getCustomerData(qstring);
        // get all expense data
        function getCustomerData(qstring){
            $.ajax({
                url: "{{URL::to('customer')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.customer-data').html(data);

            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this expense!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removeCustomer();
                swal("Deleted!", "Your expense has been deleted.", "success");
            });
        }
        // remove expense
        function removeCustomer(){
            $.ajax({
                type: "DELETE",
                url: "{{URL::to('delete-customer')}}"+'/'+customerId,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            }).done(function(data) {
                getCustomerData(qstring);
            }).fail(function() {

            });
        }
        $('.date_of_birth-edit').datepicker({
        format: 'dd-mm-yyyy'
    });
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

