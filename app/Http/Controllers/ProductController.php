<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product_data = Product::all();

        return view('pages.custom.productspage', compact('product_data'));
    }
}
