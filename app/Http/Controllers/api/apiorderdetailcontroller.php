<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order_detail;
use Illuminate\Http\Request;

class apiorderdetailcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function showOrderDetail() {
        $OrderDetail = session()->get('order_detail');
        $abc = "[abc:acb]";
        return $abc;
        // return view('admin.order-detail', compact('OrderDetail'));
        // return $carts;
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
     * @param  \App\Models\order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function show(order_detail $order_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(order_detail $order_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order_detail $order_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(order_detail $order_detail)
    {
        //
    }
}
