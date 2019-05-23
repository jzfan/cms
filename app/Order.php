<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public $casts = [
    	'items' => 'array',
    	'remarks' => 'array'
    ];

    public static function searchByDay()
    {
        $time = self::getTime(request('day'));
        // dd(date('y-m-d'), $time);
        return self::where('created_at', 'like', date('Y-m-d', $time) . '%')
                    ->orderBy('created_at', 'desc');
    }

    protected static function getTime($day)
    {
        if ($day === 'yestoday') {
            return strtotime('-1 day');
        }
        if ($day === 'lastweek') {
            return strtotime('-1 week');
        }
        return strtotime($day);
    }
}
