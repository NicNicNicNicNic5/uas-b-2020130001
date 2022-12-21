<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

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

    public function createOrder()
    {
        $items = Item::all();
        $orders = Order::all();
        return view('createOrder', compact('items'));
    }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $orders = Order::create([
        //     "id" => "0",
        //     "status" => "Selesai"
        // ]);
        // $orders = Order::create([
        //     "id" => "2",
        //     "status" => "Selesai"
        // ]);
        $items = Item::all();
        $orders = Order::all();
        return view('orders.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tagihan = 0;
        $isidata = Order::count();
        // dump($isidata);
        if ($isidata == 0) {
            Order::create([
                "id" => "0",
                "status" => "Selesai"
            ]);

            $order_Id = Order::all()->last()->id + 1;
            Order::create([
                "id" => $order_Id,
                "status" => "Menunggu Pembayaran"
            ]);

            $list = Item::all()->count();
            for ($i = 1; $i <= $list; $i++) {
                if ($request['quantity' . $i] >= 0 && $request['quantity' . $i] <= $request['stok' . $i]) {
                    DB::table('order_item')->insert([
                        'order_id' => $order_Id,
                        'item_id' => $request['id' . $i],
                        'quantity' => $request['quantity' . $i],
                    ]);
                    $stokawal = $request['stok' . $i];
                    $stokperubahan = $request['quantity' . $i];
                    $stokakhir = $stokawal - $stokperubahan;
                    DB::table('items')->where('id', $request['id' . $i])->update(['stok' => $stokakhir]);
                } else {
                    for ($j = 1; $j < $i; $j++) {
                        $stokawal = $request['stok' . $j];
                        $stokperubahan = $request['quantity' . $j];
                        $stokakhir = $stokawal + $stokperubahan;
                        DB::table('items')->where('id', $request['id' . $j])->update(['stok' => $stokawal]);
                    }
                    DB::table('orders')->where('id', $order_Id)->delete();
                    $request->session()->flash('success', "Order gagal ditambahkan");
                    return redirect()->route('orders.index');
                }
            }
            DB::table('orders')->where('id', 0)->delete();
            $request->session()->flash('success', "Order berhasil ditambahkan.");
            return redirect()->route('orders.index');

        } else {
            $order_Id = Order::all()->last()->id + 1;
            Order::create([
                "id" => $order_Id,
                "status" => "Menunggu Pembayaran"
            ]);

            $list = Item::all()->count();
            for ($i = 1; $i <= $list; $i++) {
                // DB::table('items')->where('id', $request['id' . $i])->update(['stok'=>500]);
                if ($request['quantity' . $i] >= 0 && $request['quantity' . $i] <= $request['stok' . $i]) {
                    DB::table('order_item')->insert([
                        'order_id' => $order_Id,
                        'item_id' => $request['id' . $i],
                        'quantity' => $request['quantity' . $i],
                    ]);
                    // $orders = Order::all()->last()->id;
                    // $items = Item::all()->where('id', $request['id' . $i])->first()->id;
                    // $orders->items()->attach($items);
                    // dump($orders);
                    // dump($items);
                    $stokawal = $request['stok' . $i];
                    $stokperubahan = $request['quantity' . $i];
                    $stokakhir = $stokawal - $stokperubahan;
                    DB::table('items')->where('id', $request['id' . $i])->update(['stok' => $stokakhir]);
                    // dump($stokawal);
                    $tagihan = $tagihan + ($stokperubahan * $request['harga' . $i]);
                } else {
                    for ($j = 1; $j < $i; $j++) {
                        $stokawal = $request['stok' . $j];
                        $stokperubahan = $request['quantity' . $j];
                        $stokakhir = $stokawal + $stokperubahan;
                        DB::table('items')->where('id', $request['id' . $j])->update(['stok' => $stokawal]);
                    }
                    DB::table('orders')->where('id', $order_Id)->delete();
                    $request->session()->flash('success', "Order gagal ditambahkan");
                    return redirect()->route('orders.index');
                }
            }
            $tagihanakhir = $tagihan * 1.11;
            $request->session()->flash('success', "Order berhasil ditambahkan dengan tagihan sebesar Rp. {$tagihanakhir}.");
            return redirect()->route('orders.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $items = Item::all();
        $orders = Order::all();
        $pivot = DB::table('order_item')->get();
        $join = DB::table('orders')->join('order_item', 'orders.id', '=', 'order_item.order_id')->join('items', 'order_item.item_id', '=', 'items.id')->select('*')->get();
        return view('orders.show', compact('items','orders','pivot','join'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $items = Item::all();
        $orders = Order::all();
        $selected = DB::table('orders')->join('order_item', 'orders.id', '=', 'order_item.order_id')->join('items', 'order_item.item_id', '=', 'items.id')->select('*')->get();
        return view('orders.edit', compact('selected'));
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
        $order->delete();
        return redirect()->route('orders.index')->with('success', "Data order dengan ID: {$order['id']} berhasil dihapus.");
    }
}
