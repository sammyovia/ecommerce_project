<?php

namespace App\Http\Controllers;

class ThankYouController extends Controller
{
    public function index()
    {
        return view('pages.custom.thankspage');
    }
}
