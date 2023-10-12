<?php

namespace App\Http\Controllers\Menu\Kereta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeretaRegularController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getSitTrainReg()
    {
        return view("home.kereta.kereta_regular.seat_train");
    }

    public function index()
    {
        return view("home.kereta.kereta_regular.index");
    }
    
    public function getScaduleReturn()
    {
        return view("home.kereta.kereta_regular.returndex");
    }

    public function getSitTrainRegDepart()
    {
        return view("home.kereta.kereta_regular.seat_train_depart");
    }

    public function getSitTrainRegReturn()
    {
        return view("home.kereta.kereta_regular.seat_train_return");
    }

    public function seatkaites()
    {
        return view("home.kereta.kereta_regular.seat_train_test");
    }
    
    public function orderRegular()
    {
        return view("pages.orders.btc.regular");
    }
}
