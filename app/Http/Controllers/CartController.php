<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use Cart;

class CartController extends Controller
{
    public function add(Product $product)
    {
        //dd($product);

        Cart::session(Auth::user()->id)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        //return back();

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cartItems = Cart::session(Auth()->user()->id)->getContent();

        if ((Auth::user()->role) == 'user') {
            return view('user_cart.index', ['cartItems' => $cartItems]);
        }
        if ((Auth::user()->role) == 'admin') {
            return view('cart.index', ['cartItems' => $cartItems]);
        }
    }

    public function delete($itemId)
    {
        $cartItems = Cart::session(Auth::user()->id)->remove($itemId);

        return back();
    }

    public function update($itemId)
    {

        \Cart::session(Auth::user()->id)->update($itemId, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            ),
        ]);

        return back();
    }

    public function checkout()
    {
        if ((Auth::user()->role) == 'user') {
            return view('user_cart.checkout');
        }
        if ((Auth::user()->role) == 'admin') {
            return view('cart.checkout');
        }
    }
}
