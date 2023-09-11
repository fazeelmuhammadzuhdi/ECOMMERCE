<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
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

        $totalBelanja = Cart::where('user_id', $authId)->sum('price');
        // dd($total);
        return view('frontend.cart', compact('cart', 'totalBelanja'));
    }

    public function userProfile()
    {
        return view('profile.user-profile');
    }

    public function pendingOrders()
    {
        $authId = Auth::id();
        $shippingInformation = ShippingInfo::where('user_id', $authId)->first();

        if (!$shippingInformation) {
            // Data shipping information tidak ditemukan, kirim pesan dan arahkan kembali ke halaman sebelumnya
            alert()->error('No Orders', "Your Orders Pending Not Found! ");

            return redirect()->back();
        }

        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('status', 'Pending')
            ->where('orders.shipping_info_id', $shippingInformation->id)
            ->select('products.*', 'orders.*')
            ->get();
        // dd($orders);
        return view('profile.pending-orders', compact('orders'));
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

        alert()->success('Cart', "Your Item $product->product_name Added To Cart Successfully! ");

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
        alert()->success('Cart', "Your Item $product->product_name Removed From Cart Successfully! ");

        return redirect()->route('user.cart');
    }

    public function shippingAddress()
    {
        $authId = Auth::id();
        $shippingInfo = ShippingInfo::where('user_id', $authId)->first();
        return view('profile.shipping-address', compact('shippingInfo'));
    }

    public function addShippingAddress(Request $request)
    {
        $authId = Auth::id();
        // dd($authId);
        // Cek apakah data pengiriman sudah ada untuk pengguna ini
        $existingShippingInfo = ShippingInfo::where('user_id', $authId)->first();

        if (!$existingShippingInfo) {
            $request->validate([
                'phone_number' => 'required',
                'city_name' => 'required',
                'postal_code' => 'required',
            ]);

            ShippingInfo::create([
                'user_id' => $authId,
                'phone_number' => $request->phone_number,
                'city_name' => $request->city_name,
                'postal_code' => $request->postal_code,
            ]);
            // alert()->success('Shipping Information', "Your Information Created Successfully! ");
            return redirect()->route('user.checkout');
        }
        return redirect()->route('user.checkout');
    }

    public function checkout()
    {
        $authId = Auth::id();
        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $authId)
            ->select('carts.*', 'products.product_name', 'products.product_price', 'products.product_qty', 'products.product_image')
            ->get();
        // dd($cart);

        $shippingInformation = ShippingInfo::where('user_id', $authId)->firstOrFail();
        // dd($shippingInformation);
        $totalBelanja = Cart::where('user_id', $authId)->sum('price');
        return view('profile.checkout', compact('cart', 'shippingInformation', 'totalBelanja'));
    }

    public function order(Request $request)
    {
        $authId = Auth::id();
        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $authId)
            ->select('carts.*', 'products.product_name', 'products.product_price', 'products.product_qty')
            ->get();
        // dd($cart);
        $shippingInformation = ShippingInfo::where('user_id', $authId)->firstOrFail();
        // dd($shippingInformation);

        // masukkan ke order dengan cara meloping cart karena user bisa saja memiliki banyak orderan

        foreach ($cart as $item) {
            Order::create([
                'shipping_info_id' => $shippingInformation->id,
                'product_id' => $item->product_id,
                'qty' => $item->quantity,
                'total_price' => $item->price,
            ]);

            //Delete Cart Ketika User Sudah Checkout
            $cart = Cart::where('user_id', $item->user_id)->delete();
        }
        alert()->success('Success', "Your Order Has Been Placed Successfully! ");
        return redirect()->route('user.pending-orders');
    }
}
