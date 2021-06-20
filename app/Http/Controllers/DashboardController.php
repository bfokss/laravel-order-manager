<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if ((Auth::user()->role) == 'user') {
            return view('user/dashboard');
        }
        if ((Auth::user()->role) == 'admin') {
            return view('admin/dashboard');
        }
    }
}
