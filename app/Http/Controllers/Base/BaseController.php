<?php

namespace App\Http\Controllers\Base;

use File;
use App\User;
use App\Models\Customer;
use App\Models\Broker;
use App\Models\Purchaser;
use App\Models\Saler;
use App\Models\Invoice;
use App\Models\Purchas;
use App\Models\Payble;
use App\Models\Reciveable;
use App\Models\Memo;
use App\Models\Gia;
use App\Models\Nogia;
use App\Models\Category;
use App\Models\Invoicedetail;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\InvoiceMemo;
use App\Models\InvoiceMemoDetail;
use App\Models\InvoicePurchase;
use App\Models\InvoicePurchaseDetail;
use App\Models\Users;
use App\Models\Branch;
use App\Models\StockTransfer;

class BaseController extends Controller
{
    public function __construct(){
        $this->User = new User;
        $this->Customer = new Customer;
        $this->Broker = new Broker;
        $this->Purchaser = new Purchaser;
        $this->Saler = new Saler;
        $this->Invoice = new Invoice;
        $this->Invoicedetail = new Invoicedetail;
        $this->InvoicePurchase = new InvoicePurchase;
        $this->InvoicePurchaseDetail = new InvoicePurchaseDetail;
        $this->InvoiceMemo = new InvoiceMemo;
        $this->InvoiceMemoDetail = new InvoiceMemoDetail;
        $this->Payble = new Payble;
        $this->Reciveable = new Reciveable;
        $this->Purchas = new Purchas;
        $this->Memo = new Memo;
        $this->Gia = new Gia;
        $this->Nogia = new Nogia;
        $this->Category = new Category;
        $this->Country = new Country;
        $this->Users = new Users;
        $this->Branch = new Branch;
        $this->StockTransfer = new StockTransfer;
    }

}
