@extends('templates.master')
@section('content')
<div class="row">
    <h1></h1>
<div class="col-md-12 grid-margin">
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <div class="body">
                <strong>Hi, Welcome Back!</strong>
                <br />
                <p>AdSudani Dashboard,</p>
            </div>
        </div>
    <div class="col-12 col-xl-7">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
        <div class="border-right pr-4 mb-3 mb-xl-0">
            <p class="text-muted">Invoice</p>
            <h4 class="mb-0 font-weight-bold">{{ $totalInvoice }}</h4>
        </div>
        <div class="border-right pr-4 mb-3 mb-xl-0">
            <p class="text-muted">Today’s Invoice</p>
            <h4 class="mb-0 font-weight-bold">{{$todayInvoice}}</h4>
        </div>
        <div class="border-right pr-4 mb-3 mb-xl-0">
            <p class="text-muted">Today's Purchase</p>
            <h4 class="mb-0 font-weight-bold">{{$todayPurchas}}</h4>
        </div>
       
        </div>
    </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <p class="card-title text-md-center text-xl-left">TotalCustomer</p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $totalCustomers }} </h3>
            
        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
       
        </div>  
        <p class="mb-0 mt-2 text-warning">{{$lastdayCustomers}}<span class="text-black ml-1"><small>(30 days)</small></span></p>
    </div>
    </div>
</div>
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <p class="card-title text-md-center text-xl-left">TotalBroker</p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $totalBroker }}</h3>
        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
        </div>  
        <p class="mb-0 mt-2 text-warning">{{$lastdayBroker}}<span class="text-black ml-1"><small>(30 days)</small></span></p>
    </div>
    </div>
</div>
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <p class="card-title text-md-center text-xl-left">TotalSaler</p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $totalSaler }}</h3>
        <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
        </div>  
        <p class="mb-0 mt-2 text-warning">{{$lastdaySaler}}<span class="text-black ml-1"><small>(30 days)</small></span></p>
    </div>
    </div>
</div>
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <p class="card-title text-md-center text-xl-left">TotalPurchaser</p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $totalPurchaser }}</h3>
        <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
        </div>  
        <p class="mb-0 mt-2 text-warning">{{$lastdayPurchaser}}<span class="text-black ml-1"><small>(30 days)</small></span></p>
    </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12 grid-margin">
    <div class="card bg-primary border-0 position-relative">
    <div class="card-body">
        <p class="card-title text-white">Performance Overview</p>
        <div id="performanceOverview" class="carousel slide performance-overview-carousel position-static pt-2" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <div class="row">
                <div class="col-md-4 item">
                <div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
                    <div class="icon icon-a text-white mr-3">
                    <i class="ti-cup icon-lg ml-3"></i>
                    </div>
                    <div class="content text-white">
                    <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                        <h3 class="font-weight-light mr-2 mb-1">Gia</h3>
                        <h3 class="mb-0">{{$totalGia}}</h3>
                    </div>
                  
                 
                    </div>
                </div>
                </div>
                <div class="col-md-4 item">
                <div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
                    <div class="icon icon-b text-white mr-3">
                    <i class="ti-bar-chart icon-lg ml-3"></i>
                    </div>
                    <div class="content text-white">
                    <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                        <h3 class="font-weight-light mr-2 mb-1">No Gia</h3>
                        <h3 class="mb-0">{{$totalNogia}}</h3>
                    </div>
                    
                   
                    </div>
                </div>
                </div>
               
            </div>
            </div>
            <div class="carousel-item">
            <div class="row">
                <div class="col-md-4 item">
                <div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
                    <div class="icon icon-a text-white mr-3">
                    <i class="ti-cup icon-lg ml-3"></i>
                    </div>
                    <div class="content text-white">
                    <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                        <h3 class="font-weight-light mr-2 mb-1">Customer</h3>
                        <h3 class="mb-0">{{$totalCustomers}}</h3>
                    </div>
                   
                   
                    </div>
                </div>
                </div>
                <div class="col-md-4 item">
                <div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
                    <div class="icon icon-b text-white mr-3">
                    <i class="ti-bar-chart icon-lg ml-3"></i>
                    </div>
                    <div class="content text-white">
                    <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                        <h3 class="font-weight-light mr-2 mb-1">Broker</h3>
                        <h3 class="mb-0">{{$totalBroker}}</h3>
                    </div>
                    
                   
                    </div>
                </div>
                </div>
                <div class="col-md-4 item">
                <div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
                    <div class="icon icon-c text-white mr-3">
                    <i class="ti-shopping-cart-full icon-lg ml-3"></i>
                    </div>
                    <div class="content text-white">
                    <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                        <h3 class="font-weight-light mr-2 mb-1">Saler</h3>
                        <h3 class="mb-0">{{$totalSaler}}</h3>
                    </div>
                  
                  
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#performanceOverview" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#performanceOverview" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <p class="card-title">Order and Downloads</p>
        <p class="text-muted font-weight-light">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
        <div class="d-flex flex-wrap mb-5">
        <div class="mr-5 mt-3">
            <p class="text-muted">Order value</p>
            <h3>12.3k</h3>
        </div>
        <div class="mr-5 mt-3">
            <p class="text-muted">Orders</p>
            <h3>14k</h3>
        </div>
        <div class="mr-5 mt-3">
            <p class="text-muted">Users</p>
            <h3>71.56%</h3>
        </div>
        <div class="mt-3">
            <p class="text-muted">Downloads</p>
            <h3>34040</h3>
        </div> 
        </div>
        <canvas id="order-chart"></canvas>
    </div>
    </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <p class="card-title">Sales Report</p>
        <p class="text-muted font-weight-light">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
        <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
        <canvas id="sales-chart"></canvas>
    </div>
    <div class="card border-right-0 border-left-0 border-bottom-0">
        <div class="d-flex justify-content-center justify-content-md-end">
        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-lg btn-outline-light dropdown-toggle rounded-0 border-top-0 border-bottom-0" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Today
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
            <a class="dropdown-item" href="#">January - March</a>
            <a class="dropdown-item" href="#">March - June</a>
            <a class="dropdown-item" href="#">June - August</a>
            <a class="dropdown-item" href="#">August - November</a>
            </div>
        </div>
        <button class="btn btn-lg btn-outline-light text-primary rounded-0 border-0 d-none d-md-block" type="button"> View all </button>
        </div>
    </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-7 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <p class="card-title mb-0">Top Products</p>
        <div class="table-responsive">
        <table class="table table-striped table-borderless">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Date</th>
                <th>Status</th>
            </tr>  
            </thead>
            <tbody>
            <tr>
                <td>Search Engine Marketing</td>
                <td class="font-weight-bold">$362</td>
                <td>21 Sep 2018</td>
                <td class="font-weight-medium text-success">Completed</td>
            </tr>
            <tr>
                <td>Search Engine Optimization</td>
                <td class="font-weight-bold">$116</td>
                <td>13 Jun 2018</td>
                <td class="font-weight-medium text-success">Completed</td>
            </tr>
            <tr>
                <td>Display Advertising</td>
                <td class="font-weight-bold">$551</td>
                <td>28 Sep 2018</td>
                <td class="font-weight-medium text-warning">Pending</td>
            </tr>
            <tr>
                <td>Pay Per Click Advertising</td>
                <td class="font-weight-bold">$523</td>
                <td>30 Jun 2018</td>
                <td class="font-weight-medium text-warning">Pending</td>
            </tr>
            <tr>
                <td>E-Mail Marketing</td>
                <td class="font-weight-bold">$781</td>
                <td>01 Nov 2018</td>
                <td class="font-weight-medium text-danger">Cancelled</td>
            </tr>
            <tr>
                <td>Referral Marketing</td>
                <td class="font-weight-bold">$283</td>
                <td>20 Mar 2018</td>
                <td class="font-weight-medium text-warning">Pending</td>
            </tr>
            <tr>
                <td>Social media marketing</td>
                <td class="font-weight-bold">$897</td>
                <td>26 Oct 2018</td>
                <td class="font-weight-medium text-success">Completed</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
<div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">To Do Lists</h4>
                        <div class="list-wrapper pt-2">
                            <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                               
                            </ul>
        </div>
        <div class="add-items d-flex mb-0 mt-2">
                            <input type="text" class="form-control todo-list-input"  placeholder="Add new task">
                            <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="ti-location-arrow"></i></button>
                        </div>
                    </div>
                </div>
</div>
</div>
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
    <div class="card position-relative">
    <div class="card-body">
        <p class="card-title">Detailed Reports</p>
        <div id="detailedReports" class="" >
        <div class="carousel-inner">
            <div class="row">
                <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                <div class="ml-xl-4">
                <h1>{{$totalInvoice}}</h1>
                    <h3 class="font-weight-light mb-xl-4">Total Invoice</h3>
                   
                </div>  
                </div>
                <div class="col-md-12 col-xl-9">
                <div class="row">
                    <div class="col-md-6 m-auto">
                    <div class="table-responsive mb-3 mb-md-0">
                        <table class="table table-borderless report-table">
                        <tr>
                            <td class="text-muted">Chaina</td>
                            <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalchaina == 0 ? 0 :(number_format((($totalchaina) )  ,2))}}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </td>
                            <td><h5 class="font-weight-bold mb-0"> {{$totalchaina}}</h5></td>
                        </tr>
                        <tr>
                            <td class="text-muted">USA</td>
                            <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $totalusa == 0 ? 0 :(number_format((($totalusa) )  ,2))}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </td>
                            <td><h5 class="font-weight-bold mb-0">{{$totalusa}}</h5></td>
                        </tr>
                       
                        <tr>
                            <td class="text-muted">India</td>
                            <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $totalindia == 0 ? 0 :(number_format((($totalindia) )  ,2))}}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </td>
                            <td><h5 class="font-weight-bold mb-0">{{$totalindia}}</h5></td>
                        </tr>
                       
                        </table>
                    </div>
                    </div>
                    <div class="col-md-6 mt-3">
                    <canvas id="north-america-chart"></canvas>
                    <div id="north-america-legend"></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
           
     
       

        </div>
    </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
    <div class="card">
    <div class="card-body">
        <p class="card-title mb-0">Projects</p>
        <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
            <tr>
                <th class="pl-0 border-bottom">Places</th>
                <th class="border-bottom">Total</th>
               
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-muted pl-0">Payble</td>
                <td><p class="mb-0"><span class="font-weight-bold mr-2">{{$totalPayble}}</span></p></td>
               
            </tr>
            <tr>
                <td class="text-muted pl-0">Reciveble</td>
                <td><p class="mb-0"><span class="font-weight-bold mr-2">{{$totalReciveable}}</span></p></td>
                
            </tr>
           
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
<div class="col-md-4 stretch-card">
    <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <p class="card-title">Charts</p>
            <div class="charts-data">
            <div class="mt-3">
                <p class="text-muted mb-0">Customer</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="progress progress-md flex-grow-1 mr-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalCustomers == 0 ? 0 :(number_format((($totalCustomers) ) ,2))}}%"
                     aria-valuenow="{{ $totalCustomers }}" aria-valuemin="0" aria-valuemax="{{ $totalCustomers }}"></div>
                </div>
                <p class="text-muted mb-0">{{ $totalCustomers }}</p>
                </div>
            </div>
            <div class="mt-3">
                <p class="text-muted mb-0">Broker</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="progress progress-md flex-grow-1 mr-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalBroker == 0 ? 0 :(number_format((($totalBroker) ) ,2))}}%"
                     aria-valuenow="{{ $totalBroker }}" aria-valuemin="0" aria-valuemax="{{ $totalBroker }}"></div>
                </div>
                <p class="text-muted mb-0">{{ $totalBroker }}</p>
                </div>
            </div>
            <div class="mt-3">
                <p class="text-muted mb-0">Saler</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="progress progress-md flex-grow-1 mr-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalSaler == 0 ? 0 :(number_format((($totalSaler) ) ,2))}}%"
                    aria-valuenow="{{$totalSaler}}" aria-valuemin="0" aria-valuemax="{{$totalSaler}}"></div>
                </div>
                <p class="text-muted mb-0">{{$totalSaler}}</p>
                </div>
            </div>
            <div class="mt-3">
                <p class="text-muted mb-0">purchaser</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="progress progress-md flex-grow-1 mr-4">
                    <div class="progress-bar bg-success" role="progressbar"  style="width: {{ $totalPurchaser  == 0 ? 0 :(number_format((( $totalPurchaser ) ) ,2))}}%"
                     aria-valuenow="{{ $totalPurchaser }}" aria-valuemin="0" aria-valuemax="{{ $totalPurchaser }}"></div>
                </div>
                <p class="text-muted mb-0">{{ $totalPurchaser }}</p>
                </div>
            </div>
            </div>  
        </div>
        </div>
    </div>
    <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
        <div class="card data-icon-card-primary">
        <div class="card-body">
            <p class="card-title text-white">Number of Meetings</p>                      
            <div class="row">
            <div class="col-8 text-white">
                <h3>3404</h3>
                <p class="text-white font-weight-light mb-0">The total number of sessions within the date range. It is the period time</p>
            </div>
            <div class="col-4 background-icon">
                <i class="ti-calendar"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="col-md-4 stretch-card">
    <div class="card">
    <div class="card-body">
        <p class="card-title">Notifications</p>
        <ul class="icon-data-list">
        <li>
            <p class="text-primary mb-1">Isabella Becker</p>
            <p class="text-muted">Sales dashboard have been created</p>
            <small class="text-muted">9:30 am</small>
        </li>
        <li>
            <p class="text-primary mb-1">Adam Warren</p>
            <p class="text-muted">You have done a great job #TW11109872</p>
            <small class="text-muted">10:30 am</small>
        </li>
        <li>
            <p class="text-primary mb-1">Leonard Thornton</p>
            <p class="text-muted">Sales dashboard have been created</p>
            <small class="text-muted">11:30 am</small>
        </li>
        <li>
            <p class="text-primary mb-1">George Morrison</p>
            <p class="text-muted">Sales dashboard have been created</p>
            <small class="text-muted">8:50 am</small>
        </li>
        <li>
            <p class="text-primary mb-1">Ryan Cortez</p>
            <p class="text-muted">Herbs are fun and easy to grow.</p>
            <small class="text-muted">9:00 am</small>
        </li>
        
        </ul>
    </div>
    </div>
</div>
@endsection
