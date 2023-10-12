<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class OrdersController extends Controller
{
    public function index()
    {
       return view("pages.orders.index");
    }
    public function adminListOrder()
    {
       return view("pages.orders.admin.index");
    }

    public function adminkaiRegularOrder()
    {
       return view("pages.orders.admin.kai_regular");
    }

    public function adminkaiWisataOrder()
    {
       return view("pages.orders.admin.kai_wisata");
    }

    public function adminkaiLuarbiasaOrder()
    {
       return view("pages.orders.admin.kai_luarbiasa");
    }

    public function adminkaiIstimewaOrder()
    {
       return view("pages.orders.admin.kai_istimewa");
    }

    public function adminMiceOrder()
    {
       return view("pages.orders.admin.mice");
    }

    public function adminFlightOrder()
    {
       return view("pages.orders.admin.pesawat");
    }
    
    public function detailTrainsaksiTrainBtc(Request $request)
    {
        return view("pages.orders.btc.details_transaction_train");
    }

    public function detailTrainsaksiFlightBtc(Request $request)
    {
        return view("pages.orders.btc.details_transaction_flight");
    }

    public function detailTrainsaksiHotelBtc(Request $request)
    {
        return view("pages.orders.btc.details_transaction_hotel");
    }

    public function payment()
    {
       return view("pages.finance.payment");
    }

    public function payment_page()
    {
       return view("pages.finance.payment_page");
    }

    public function getLocalStorage()
    {

        return '<script> 
       localStorage.getItem("data_token")
         </script>';
    }
}
