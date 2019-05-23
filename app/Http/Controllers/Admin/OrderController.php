<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = request()->has('day') 
    			? Order::searchByDay('today')->paginate()
    			: Order::orderBy('created_at', 'desc')->paginate();
    	return view('order.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
    	$order->delete();
    }
}
