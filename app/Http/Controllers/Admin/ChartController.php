<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class ChartController extends Controller
{
    public function users()
    {
        $arr = array_merge($this->zeroList(), $this->registeredIn30Days());
        ksort($arr);
        return $arr;
    }

    private function zeroList()
    {
        $arr = [];
        for ($i = 30; $i--;) {
            $arr[date('Y-m-d', strtotime("-{$i} days"))] = 0;
        }
        return $arr;
    }

    private function registeredIn30Days()
    {
        $begin = date('Y-m-d', strtotime('-29 days'));

        $days = User::where('created_at', '>', $begin)
                        ->pluck('created_at')
                        ->map(function ($dt) {
                            return $dt->format('Y-m-d');
                        })->all();
        return array_count_values($days);

    }
}
