<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart_data = Auth::user()->products;
        $cart_data->calculateSubtotal();

        return view('pages.custom.cartpage', compact('cart_data'));
    }

    public function store(Request $request)
    {
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => DB::raw('quantity + '.$request->quantity), 'updated_at' => now()]
        );

        return redirect()->route('cart.index')->with('message', 'Product successfully added to cart');
    }

    public function destroy(string $id)
    {
        Cart::destroy($id);

        return redirect()->route('cart.index')->with('message', 'Product removed from cart');
    }
}
