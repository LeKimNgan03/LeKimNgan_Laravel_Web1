<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Orderdetail::where('order.status', '!=', 0)
            ->join('order', 'order.id', '=', 'orderdetail.order_id')
            ->join('product', 'product.id', '=', 'orderdetail.product_id')
            ->select('orderdetail.id', 'orderdetail.id', 'order.name as ordername', 'product.name as productname', 'product.price as productprice', 'product.qty as productqty', 'amount')
            ->get();
        return view("backend.orderdetail.index", compact("list"));
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
        //
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
