<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesawatController extends Controller
{

    public function index()
    {
        return view("home.pesawat.index");
    }

    public function listPax()
    {
        return view("home.pesawat.getaddon");
    }

    public function return()
    {
        return view("home.pesawat.getreturn");
    }
}

