<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function category($id)
    {
        $category = Category::findOrFail($id);
        $product = Product::where('product_category_id', $id)->latest()->get();
        // $product = Product::where('product_category_id', $category->id)->get();
        // dd($product);
        return view('frontend.category', compact('category', 'product'));
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
