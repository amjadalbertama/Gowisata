<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TesController extends Controller
{
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        
        $konvert = json_decode($response->body());
        
        return view('tes',["tes"=>$konvert]);
    }
}
