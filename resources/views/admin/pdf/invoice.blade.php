<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>AdSudani</title>
    
    <style>
        table, th, td {
            /* border: 1px solid black; */
            /* padding: 5px; */
        }
        table {
            /* border-spacing: 15px; */
        }

        .borderless td, .borderless th {
            border: none !important;
        }
    </style>

  </head>
  <body>

    <h3>Invoice</h3>
    <div class="row">
        <table class="table ">
            <tr>
              <td> 
                <table class="table-bordered">
                    <tr>
                        <td class="meta-head">NO #</td>
                        <td>{{ str_pad($invoice->id, 8, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                    <tr>
                        <td class="meta-head">L INV NO #</td>
                        <td>{{$invoice->l_invoice}}</td>
                    </tr>
                    <tr>
                        <td class="meta-head">E INV NO #</td>
                        <td>{{$invoice->e_invoice}}</td>
                    </tr>
                    <tr>
                        <td class="meta-head">DATE</td>
                        <td>{{\Carbon\Carbon::parse($invoice->date)->format('D d M Y')}}</td>
                    </tr>
                    <tr>
                        <td class="meta-head">TERM</td>
                        <td>{{$invoice->term}}</td>
                    </tr>
                    <tr>
                        <td class="meta-head">DUE DATE</td>
                        <td>{{\Carbon\Carbon::parse($invoice->duedate)->format('D d M Y')}}</td>
                    </tr>
                </table>
             </td>
              <td>
                <table class="table-bordered">
                    <tr>
                        <td class="meta-head">CUSTOMER</td>
                        <td colspan="3">
                            {{$invoice->customer->name}}
                        </td>
                    </tr>
                    <tr>
                        <td class="meta-head">REFERENCE</td>
                        <td colspan="3">{{$invoice->reference}}</td>
                    </tr>
                    <tr>
                        <td class="meta-head">BROKER</td>
                        <td>{{ $invoice->is_broker == 1 ? "Yes" : "No" }}</td>
                        <td class="meta-head">PERCENTAGE</td>
                        <td>{{$invoice->percentage}}</td>
                    </tr>
        
                    <tr>
                        <td class="meta-head">COUNTRY</td>
                        <td colspan="3">{{$invoice->country->name}}</td>
                    </tr>
                    <tr>
                        <td class="meta-head">UNIT PRICE</td>
                        <td colspan="3" >{{$invoice->unit_price}}</td>
                    </tr>
                    <tr>
                        <td class="meta-head">RATE</td>
                        <td colspan="3">{{$invoice->rate}}</td>
                    </tr>
                </table>
              </td>
            </tr>
        </table>
        {{-- <div class="col-md-6">
        
        </div>
        <div class="col-md-6 ml-50">
           
        </div> --}}
    </div>

    {{-- <div class="row mt-4">
       
    </div> --}}
    
    <div id="row mt-4" >
            <div class="row">
                <div class="col-md-12">
                    <h3>Invoice details</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="items" class="table-bordered">
                        <tr>
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
                            @foreach ($invoice->invoiceDetails as $item)
                            <tr class="item-row">
                                <td class="item-name">{{ $loop->iteration }}</td>
                                <td class="item-name">{{ $item->branch }}</td>
                                <td class="description">{{ $item->is_gia == 1 ? "Gia" : "No Gia" }}</td>
                                <td class="description">{{$item->details}}</td>
                                <td class="description text-center">{{$item->pcs}}</td>
                                <td class="text-center">{{$item->carat}}</td>
                                <td class="text-center">{{$item->unit_price}}</td>
                                <td class="text-center">{{$item->amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="6" class="blank"> </td>
                            <td colspan="1" class="total-line">Subtotal :</td>
                            <td class="text-center">{{$invoice->total ?? 000.00}}</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="blank"> </td>
                            <td colspan="1" class="total-line">Total :</td>
                            <td class="text-center">{{$invoice->total ?? 000.00}}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="blank"> </td>
                            <td colspan="1" class="total-line balance">Carat :</td>
                            <td class="text-center">{{$invoice->carat_total ?? 000.00}}</td>
                            <td colspan="1" class="total-line balance">Balance Due :</td>
                            <td class="text-center">{{$invoice->total ?? 000.00}}</td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>