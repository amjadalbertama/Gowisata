<?php

namespace App\Http\Controllers\Menu;

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
        return view("home.kereta.kereta_regular");
    }

    

    // public function kereta()
    // {
    //     return view("home.menu.kereta");
    // }
    
}
