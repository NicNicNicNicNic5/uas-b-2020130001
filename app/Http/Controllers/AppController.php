<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function index(){
        $items = Item::all();
        // dump($items);
        $orders = Order::all();
        return view('index', compact('items','orders'));
        // return view('index', compact('orders'));
    }

}
