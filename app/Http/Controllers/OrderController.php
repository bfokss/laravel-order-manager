<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Cart;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMade;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'shipping_zipcode' => 'required',
            'shipping_mail' => 'required | email'
        ]);

        $order = new Order();

        $order->order_number = uniqid();

        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_zipcode = $request->input('shipping_zipcode');
        $order->shipping_mail = $request->input('shipping_mail');

        if (!$request->has('billing_fullname')) {
            $order->billing_fullname = $request->input('shipping_fullname');
            $order->billing_state = $request->input('shipping_state');
            $order->billing_city = $request->input('shipping_city');
            $order->billing_address = $request->input('shipping_address');
            $order->billing_phone = $request->input('shipping_phone');
            $order->billing_zipcode = $request->input('shipping_zipcode');
        } else {
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_state = $request->input('billing_state');
            $order->billing_city = $request->input('billing_city');
            $order->billing_address = $request->input('billing_address');
            $order->billing_phone = $request->input('billing_phone');
            $order->billing_zipcode = $request->input('billing_zipcode');
        }

        $order->grand_total = Cart::session(Auth::user()->id)->getTotal();
        $order->item_count = Cart::session(Auth::user()->id)->getContent()->count();

        $order->user_id = Auth::user()->id;

        $order->status = 'pending';

        $order->save();

        $cartItems = \Cart::session(Auth::user()->id)->getContent();


        foreach ($cartItems as $item) {
            $order->items()->attach($item->id, ['price' => $item->price, 'quantity' => $item->quantity]);
        }

        \Cart::session(Auth::user()->id)->clear();

        Mail::to($order->shipping_mail)->send(new OrderMade($order));

        if ((Auth::user()->role) == 'admin') {
            return redirect('/main_content')->with('success', 'An order has been placed!');
        }
        if ((Auth::user()->role) == 'user') {
            return redirect('/user_content')->with('success', 'An order has been placed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if ((Auth::user()->role) == 'admin') {
            return view('orders.show', ['order' => $order]);
        }
        if ((Auth::user()->role) == 'user') {
            return view('orders.usershow', ['order' => $order]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', ['order' => $order]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {


        request()->validate([
            'status' => 'required',
            'shipping_fullname' => 'required',
            'shipping_address' => 'required',
            'shipping_city' => 'required',
            'shipping_state' => 'required',
            'shipping_zipcode' => 'required',
            'shipping_phone' => 'required',
            'shipping_mail' => 'required'
        ]);
        //$order->update($request->all());

        $order->update([
            'status' => request('status'),
            'shipping_fullname' => request('shipping_fullname'),
            'shipping_address' => request('shipping_address'),
            'shipping_city' => request('shipping_city'),
            'shipping_state' => request('shipping_state'),
            'shipping_zipcode' => request('shipping_zipcode'),
            'shipping_phone' => request('shipping_phone'),
            'shipping_mail' => request('shipping_mail')
        ]);


        return redirect()->route('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        $max = DB::table('orders')->max('id') + 1;
        DB::statement("ALTER TABLE orders AUTO_INCREMENT =  $max");

        return redirect()->route('orders');
    }
}
