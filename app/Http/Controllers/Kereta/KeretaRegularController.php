<?php

namespace App\Http\Controllers\Kereta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeretaRegularController extends Controller
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
        return view("home.kereta.kereta_regular");
    }

    public function kereta()
    {
        return view("home.menu.kereta");
    }
}
