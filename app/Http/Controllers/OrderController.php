<?php

namespace App\Http\Controllers;

use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingInformation = DB::table('shipping_infos')
            ->join('users', 'shipping_infos.user_id', '=', 'users.id')
            ->select('users.*', 'shipping_infos.*')
            ->get();
        // dd($shippingInformation);
        // ShippingInfo::join('users', '')->latest()->get();
        $title = "Shipping Information User";
        return view('order.pending', compact('shippingInformation', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $title = "Orders Pending";
        $shippingInformation = ShippingInfo::findOrFail($id);
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('status', 'Pending')
            ->where('orders.shipping_info_id', $shippingInformation->id)
            ->select('products.*', 'orders.*')
            ->get();
        // dd($orders);

        return view('order.pending-detail', compact('orders', 'title', 'shippingInformation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
