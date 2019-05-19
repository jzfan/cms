<?php

namespace App\Http\Controllers\Api;

use App\Food;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::where('category_id', '>=', request('cid'))->select([
            'id', 'price', 'tax_rate', 'name', 'abbr', 'category_id'
        ])->orderBy('category_id')->limit(24)->get();
        if ($foods->count() === 24) {
           return $foods;
        }
        $append = Food::select([
            'id', 'price', 'tax_rate', 'name', 'abbr', 'category_id'
        ])->orderBy('category_id')->limit(24-$foods->count())->get();
        return $foods->merge($append);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
