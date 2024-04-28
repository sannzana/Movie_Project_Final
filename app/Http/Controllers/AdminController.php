<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
{
    // Just an example to fetch some data
    return view('admin.dashboard');
}
}
