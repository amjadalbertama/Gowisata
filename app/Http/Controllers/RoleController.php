<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('settings.role.index');
    }
}
