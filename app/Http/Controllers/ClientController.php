<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        $relatedProduct = Product::where('product_subcategory_id', $product->product_subcategory_id)->where('id', '!=', $product->id)->latest()->get();
        return view('frontend.product-details', compact('product', 'relatedProduct'));
    }

    public function cart()
    {
        $authId = Auth::id();
        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $authId)
            ->select('carts.*', 'products.product_name', 'products.product_price', 'products.product_qty', 'products.product_image')
            ->get();
        // dd($cart);
        return view('frontend.cart', compact('cart'));
    }

    public function userProfile()
    {
        return view('profile.user-profile');
    }

    public function pendingOrders()
    {
        return view('profile.pending-orders');
    }

    public function history()
    {
        return view('profile.history');
    }

    public function addProductToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $quantity = intval($request->quantity);
        $price = $product->product_price * $quantity;
        // dd($price);

        $cart = Cart::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'quantity' => $quantity,
            'price' => $price
        ]);

        // dd($cart);
        // Update Quantity Product
        $product->update([
            'product_qty' => $product->product_qty - $quantity
        ]);
        return redirect()->route('user.cart')->with('message', 'Your Item Added To Cart Successfully!');
    }

    public function cartDelete($id)
    {
        $cart = Cart::findOrFail($id);
        // dd($cart);
        $product = Product::where('id', $cart->product_id)->first();
        $product->update([
            'product_qty' => $product->product_qty + $cart->quantity

        ]);

        $cart->delete();

        return redirect()->route('user.cart');
    }
}
