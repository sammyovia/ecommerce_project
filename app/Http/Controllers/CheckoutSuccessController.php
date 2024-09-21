<?php

namespace App\Http\Controllers;

class CheckoutSuccessController extends Controller
{
    public function index()
    {
        return view('pages.custom.checkout-successpage');
    }
}
