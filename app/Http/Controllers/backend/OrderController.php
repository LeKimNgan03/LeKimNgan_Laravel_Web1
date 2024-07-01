<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Order::where('order.status', '!=', 0)
            ->join('user', 'user.id', '=', 'order.user_id')
            ->select('order.id', 'order.id', 'username as user_name', 'order.name', 'order.phone', 'order.email', 'order.address')
            ->orderBy('order.created_at', 'desc')
            ->get();
        return view('backend.order.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list = Orderdetail::where('order.status', '!=', 0)
            ->join('order', 'order.id', '=', 'orderdetail.order_id')
            ->join('product', 'product.id', '=', 'orderdetail.product_id')
            ->select('orderdetail.id', 'orderdetail.id', 'order.name as ordername', 'product.name as productname', 'product.price as productprice', 'product.qty as productqty', 'amount')
            ->get();
        return view("backend.orderdetail.index", compact("list"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
