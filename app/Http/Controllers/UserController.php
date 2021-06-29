<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Auth;

class UserController extends Controller
{
    public function home()
    {

        $orders = Order::limit(10)->where('user_id', Auth::user()->id)->get();
        //$orders = Order::all();

        return view('user.user_content', ['orders' => $orders]);
    }

    public function products()
    {
        $products = Product::all();

        return view('user/products', ['products' => $products]);
    }


    public function orders()
    {
        $orders = Order::all()->where('user_id', Auth::user()->id);
        //dd($orders);

        return view('user/orders_list', ['orders' => $orders]);
    }
}
