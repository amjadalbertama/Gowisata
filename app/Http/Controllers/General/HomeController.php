<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(Request $request)
    // {
    //     $this->middleware('auth:sanctum', [
    //         'except' => [],
    //     ]);
    // }

    public function index()
    {
        return view("home.index");
    }

    public function kereta()
    {
        return view("home.menu.kereta");
    }
}
