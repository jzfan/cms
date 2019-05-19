<?php

namespace App\Http\Controllers\Admin;

use App\Food;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    public function index()
    {
    	$foods = Food::with('category')->orderBy('id', 'desc')->paginate();
    	return view('food.index', compact('foods'));
    }

    public function edit(Food $food)
    {
    	return view('food.edit', compact('food'));
    }

    public function update(Food $food)
    {
    	$food->update($this->checkInput());
    	session()->flash('notice', "updated successfully");
    	return redirect('/admin/foods');
    }

    public function destroy(Food $food)
    {
    	$food->delete();
    }

    public function create()
    {
    	return view('food.create');
    }

    public function store()
    {
    	Food::create($this->checkInput());
    	session()->flash('notice', "created successfully");
        return redirect('/admin/foods');
    }

    protected function checkInput()
    {
    	 return request()->validate([
    		'abbr' => 'required',
    		'name' => 'required',
    		'price' => 'required|numeric',
    		'tax_rate' => 'required|numeric',
    		'category_id' => 'required|exists:categories,id',
    	]);
    }
}
