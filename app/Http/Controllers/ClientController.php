<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function category()
    {
        return view('frontend.category');
    }
    public function singleProduct()
    {
        return view('frontend.single-product');
    }
    public function addToCart()
    {
        return view('frontend.category');
    }
}
