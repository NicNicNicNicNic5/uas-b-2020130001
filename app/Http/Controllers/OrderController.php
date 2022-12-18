<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function order()
    {
        $orders = Order::all();
        return view('order', compact('orders'));
    }

    public function createOrder(){
        $items = Item::all();
        $orders = Order::all();
        return view('createOrder', compact('items'));
    }

    public function attach(){
        // $orders = Order::find(last());
        $orders = Order::find(5);
        $items = Item::find([1, 2, 4]);
        $orders->categories()->attach($items);
    }

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
        $orders = Order::create([
            "id" => "1",
            "status" => "Selesai"
        ]);
        $orders = Order::create([
            "id" => "2",
            "status" => "Selesai"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = [
        //     'id' => 'required|numeric|min:1000000000000000|max:9999999999999999',
        //     'nama' => 'required|max:255',
        // ];
        // $validated = $request->validate($rules);
        // Order::create($validated);

        // $request->session()->flash('success', "Item yang bernama {$validated['nama']} sudah berhasil ditambahkan.");
        // return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
