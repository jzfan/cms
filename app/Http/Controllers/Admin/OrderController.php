<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
    	$order = Order::first();
    	$orders = Order::orderBy('id', 'desc')->paginate();
    	return view('order.index', compact('orders'));
    }
}
