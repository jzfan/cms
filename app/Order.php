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

    // public function details()
    // {
    // 	return collect($this->items)->map(function ($item) {
    // 		return $item['abbr'] . ' : ' . $item['price'] . ' x ' . $item['qty'] . ' = ' . $item['subtotal'];
    // 	});
    // }
}
