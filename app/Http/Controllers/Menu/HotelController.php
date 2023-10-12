<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    public function details()
    {
        return view("home.hotel.index");
    }

    public function detailsRooms()
    {
        return view("home.hotel.details");
    }
    
    public function orderLuarbiasa()
    {
        return view("pages.orders.btc.hotel");
    }
    
}

