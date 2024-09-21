<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart_data = Auth::user()->products;
        $cart_data->calculateSubtotal();

        if ($cart_data->isEmpty()) {
            return redirect()->route('cart.index')->with('message', 'Cart is empty');
        }

        return view('pages.custom.checkoutpage', compact('cart_data'));
    }
}
