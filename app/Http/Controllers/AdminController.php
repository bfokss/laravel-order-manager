<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;


class AdminController extends Controller
{
    public function home()
    {

        $orders = Order::limit(10)->orderBy('id', 'desc')->get();
        //$orders = Order::all();
        //dd($orders);

        return view('admin/main_content', ['orders' => $orders]);
    }

    public function products()
    {
        $products = Product::all();

        return view('admin/products', ['products' => $products]);
    }

    public function orders()
    {
        $orders = Order::all();

        return view('admin/orders', ['orders' => $orders]);
    }

    public function users_list()
    {
        $data = User::all();

        return view('admin/users_list', ['data' => $data]);
    }
}
