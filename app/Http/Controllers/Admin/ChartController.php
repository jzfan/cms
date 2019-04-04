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
        $arr = User::where('created_at', '>', $begin)
            ->select(['created_at'])
            ->pluck('created_at')
            ->map(function ($str) {
                return substr($str, 0, 10);
            })->all();

        return array_count_values($arr);
    }
}
