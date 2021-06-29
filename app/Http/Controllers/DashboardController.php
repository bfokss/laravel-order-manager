<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if ((Auth::user()->role) == 'user') {
            return redirect('user_content');
        }
        if ((Auth::user()->role) == 'admin') {
            return redirect('main_content');
        }
    }
}
