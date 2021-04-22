@extends('templates.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body create-invoice">
                <h3>Create Invoice</h3>
                {{Form::open(['class' => 'form invoice-form'])}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header">
                            <tr>
                                <td class="meta-head">NO #</td>
                                <td><input type="text" value="0001810"></td>
                            </tr>
                            <tr>
                                <td class="meta-head">L INV NO #</td>
                                <td><input type="text" value="0001018"></td>
                            </tr>
                            <tr>
                                <td class="meta-head">E INV NO #</td>
                                <td><input type="text" value="0001018"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="tbl-invoice-header sec">
                            <tr>
                                <td class="meta-head">DATE</td>
                                <td><input type="text" value="December 15, 2009" id="date"></td>
                            </tr>
                            <tr>
                                <td class="meta-head">TERM</td>
                                <td><input type="text" value="12"></td>
                            </tr>
                            <tr>
                                <td class="meta-head">DUE DATE</td>
                                <td><input type="text" value="December 18, 2009" id="date"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="tbl-invoice-header customer">
                            <tr>
                                <td class="meta-head">CUSTOMER</td>
                                <td colspan="3"><input type="text" value="Web Developer"></td>
                            </tr>
                            <tr>
                                <td class="meta-head">REFERENCE</td>
                                <td colspan="3"><input type="text" value="App Developer"></td>
                            </tr>
                            <tr>
                                <td class="meta-head">BROKER</td>
                                <td><input type="text" class="text-center" value="Yes"></td>
                                <td class="meta-head">PERCENTAGE</td>
                                <td><input type="text" class="text-center" value="2"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="tbl-invoice-header sec">
                            <tr>
                                <td class="meta-head">COUNTRY</td>
                                <td><input type="text" value="USA"></td>
                            </tr>
                            <tr>
                                <td class="meta-head">UNIT PRICE</td>
                                <td><input type="text" value="000123"></td>
                            </tr>
                            <tr>
                                <td class="meta-head">RATE</td>
                                <td><input type="text" value="75.6"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-4 text-right">
                    <div class="col-md-12"><input type="text" class="add_gia_row" id="add_gia" value="USA"><input type="text" class="add_gia_row" id="add_gia_details" value="USA"><button id="addrow" type="button" class="btn btn-success btn-rounded btn-icon">
                            <i class="ti-plus"></i>
                        </button> <button type="button" class="btn btn-danger btn-rounded btn-icon delete-row">
                            <i class="ti-minus"></i>
                        </button></div>
                </div>
                <div class="row">
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

                            <tr class="item-row">
                                <td class="item-name text-center"><input type="checkbox" name="record"></td>
                                <td class="item-name">1</td>
                                <td class="item-name"><input type="text" value="Branch"></td>
                                <td class="description"><input type="text" value="GIA"></td>
                                <td class="description"><input type="text" value="Monthly web updates for "></td>
                                <td class="description"><input type="text" value="18"></td>
                                <td><input type="text" class="qty" value="1"></td>
                                <td class="text-right"><input type="text" class="cost" value="650.00"></td>
                                <td class="text-right"><span class="price">$650.00</span></td>
                            </tr>

                            <tr class="item-row">
                                <td class="item-name text-center"><input type="checkbox" name="record"></td>
                                <td class="item-name">1</td>
                                <td class="item-name"><input type="text" value="Branch"></td>
                                <td class="description"><input type="text" value="GIA"></td>
                                <td class="description"><input type="text" value="Monthly web updates for "></td>
                                <td class="description"><input type="text" value="18"></td>
                                <td><input type="text" class="qty" value="1"></td>
                                <td class="text-right"><input type="text" class="cost" value="650.00"></td>
                                <td class="text-right"><span class="price">$650.00</span></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="blank"> </td>
                                <td colspan="2" class="total-line">Subtotal :</td>
                                <td class="total-value"><div id="subtotal">$875.00</div></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="blank"> </td>
                                <td colspan="2" class="total-line">Total :</td>
                                <td class="total-value"><div id="total">$875.00</div></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="blank"> </td>
                                <td colspan="2" class="total-line">Amount Paid :</td>
                                <td class="total-value"><input type="text" id="paid" value="$00.00"></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="blank"> </td>
                                <td colspan="2" class="total-line balance">Balance Due :</td>
                                <td class="total-value balance"><div class="due">$875.00</div></td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
@section('script')

@stop
