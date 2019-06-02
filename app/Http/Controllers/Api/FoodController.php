<?php

namespace App\Http\Controllers\Api;

use App\Food;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::orderBy('category_id')
        				->orderBy('sort')
        				->select([
            				'id', 'price', 'tax_rate', 'name', 'abbr', 'category_id'
        				])->get();
        return response()->json($foods);
    }
}
