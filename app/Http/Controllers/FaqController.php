<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FaqController extends Controller
{
    public function index()
    {
       return view("pages.faq.index");
    }
    public function indexAdmin()
    {
       return view("pages.faq.admin.index");
    }
}
