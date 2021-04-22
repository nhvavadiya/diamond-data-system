<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Broker;
use App\Models\Purchaser;
use App\Models\Saler;
use App\Models\Invoice;
use App\Models\Purchas;
use App\Models\Gia;
use App\Models\Nogia;
use App\Models\Payble;
use App\Models\Reciveable;

class HomeController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $totalCustomers = Customer::query()->count();
        $lastdayCustomers = Customer::whereBetween('created_at', [Carbon::now()->subDays(30)->format('Y-m-d')." 00:00:00", Carbon::now()->format('Y-m-d')." 23:59:59"])->get()->count();

        $totalBroker = Broker::query()->count();
        $lastdayBroker = Broker::whereBetween('created_at', [Carbon::now()->subDays(30)->format('Y-m-d')." 00:00:00", Carbon::now()->format('Y-m-d')." 23:59:59"])->get()->count();
       

        $totalPurchaser = Purchaser::query()->count();
        $lastdayPurchaser = Purchaser::whereBetween('created_at', [Carbon::now()->subDays(30)->format('Y-m-d')." 00:00:00", Carbon::now()->format('Y-m-d')." 23:59:59"])->get()->count();

        $totalSaler = Saler::query()->count();
        $lastdaySaler = Saler::whereBetween('created_at', [Carbon::now()->subDays(30)->format('Y-m-d')." 00:00:00", Carbon::now()->format('Y-m-d')." 23:59:59"])->get()->count();

        $totalInvoice = Invoice::query()->count();
        $todayInvoice = Invoice::whereDate('created_at', Carbon::today())->where('inv_type', 1)->get()->count();
        $todayPurchas = Purchas::whereDate('created_at', Carbon::today())->where('inv_type', 2)->get()->count();

        $totalGia = Gia::query()->count();
        $totalNogia = Nogia::query()->count();
        $totalPayble = Payble::query()->where('type', 2)->count();
        $totalReciveable = Reciveable::query()->where('type', 1)->count();

       $totalchaina = Invoice::query()->where('country_id', '3')->count();
       $totalusa = Invoice::query()->where('country_id', '1')->count();
       $totalindia = Invoice::query()->where('country_id', '2')->count();
       

        return view('admin.home.dashboard', ['totalCustomers' => $totalCustomers,'totalBroker' => $totalBroker,'totalPurchaser' => $totalPurchaser,'totalSaler' =>   $totalSaler,'totalInvoice' =>  $totalInvoice,'todayInvoice' =>   $todayInvoice,
        'todayPurchas' =>   $todayPurchas,'lastdayCustomers' =>   $lastdayCustomers,'lastdayPurchaser' =>   $lastdayPurchaser,'lastdaySaler' =>   $lastdaySaler,'lastdayBroker' =>   $lastdayBroker,'totalGia' =>   $totalGia,'totalNogia' =>   $totalNogia,
        'totalPayble' => $totalPayble,'totalReciveable' => $totalReciveable,'totalchaina' =>  $totalchaina,'totalusa' =>  $totalusa,'totalindia'=>$totalindia]);
    }
}

