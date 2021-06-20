<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\User;


class AdminController extends Controller
{
    public function home()
    {
        return view('admin/main_content');
    }

    public function products()
    {
        $products = Product::all();

        return view('admin/products', ['products' => $products]);
    }

    public function orders()
    {
        return view('admin/orders');
    }

    public function users_list()
    {
        $data = User::all();

        return view('admin/users_list', ['data' => $data]);
    }
}
