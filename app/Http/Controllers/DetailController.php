<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DetailController extends Controller
{
    public function index($id)
    {
        $data = Product::findOrFail($id);

        return view('pages.custom.detailspage', compact('data'));
    }
}
