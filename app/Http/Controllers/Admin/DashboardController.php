<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
    	$orders = Order::whereDate('created_at', Carbon::today())->get();
    	$total = $orders->sum(function ($order) {
    		return $order->total;
    	});
    	$tax = $orders->sum(function ($order) {
    		return $order->tax;
    	});
        $orders_count = $orders->count();
    	return view('dashboard', compact('total', 'tax', 'orders_count'));
    }

    public function plugins()
    {
    	return view('plugins');
    }
}
