<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // $user = Auth::user();
        // dd($user);
        $product = Product::latest()->get();
        return view('frontend.home', compact('product'));
    }
}
