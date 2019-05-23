<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Order;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public function sold()
    {
        return response()->json([
            'this_week' => $this->thisWeekSold(),
            'last_week' => $this->lastWeekSold(),
        ]);
    }

    protected function thisWeekSold()
    {
        return $this->subWeekSold(0);
    }

    protected function lastWeekSold()
    {
        return $this->subWeekSold(1);
    }

    protected function subWeekSold($sub)
    {
        $dt = Carbon::now()->subWeeks($sub);
        $orders = Order::whereDate('created_at', '>=', $dt->startOfWeek())
                        ->whereDate('created_at', '<=', $dt->endOfWeek())
                        ->pluck('total', 'created_at');
        $orders = $orders->groupBy(function ($item, $key) {
            return date('N', strtotime($key));
        })->map(function ($order) {
            return (string)array_sum($order->toArray());
        });
        $arr = [];
        foreach (range(1, 7) as $i) {
            $arr[] = $orders[$i] ?? '0';
        }
        return $arr;
    }
}
