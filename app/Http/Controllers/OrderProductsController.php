<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderProductsRequest;
use App\Http\Requests\UpdateOrderProductsRequest;
use App\Models\OrderProducts;

class OrderProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreOrderProductsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderProducts $orderProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderProducts $orderProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderProductsRequest $request, OrderProducts $orderProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderProducts $orderProducts)
    {
        //
    }
}
