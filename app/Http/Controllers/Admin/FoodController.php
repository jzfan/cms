<?php

namespace App\Http\Controllers\Admin;

use App\Food;
use App\Category;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort')->withCount('foods')->get();
        return view('food.categories', compact('categories'));
    }

    public function byCid()
    {
        $category = Category::findOrFail(request('cid'));
    	$foods = Food::where('category_id', request('cid'))->orderBy('sort')->paginate();
                            // dd($category->toArray());
    	return view('food.index', compact('category', 'foods'));
    }

    public function edit(Food $food)
    {
        session()->put('url.intended', url()->previous());
    	return view('food.edit', compact('food'));
    }

    public function update(Food $food)
    {
    	$food->update($this->checkInput());
    	session()->flash('notice', "updated successfully");
    	return redirect()->intended();
    }

    public function destroy(Food $food)
    {
    	$food->delete();
    }

    public function create()
    {
        $category = Category::findOrFail(request('cid'));
    	return view('food.create', compact('category'));
    }

    public function store()
    {
    	Food::create($this->checkInput());
    	session()->flash('notice', "created successfully");
        return redirect('/admin/category/'. request('category_id') .'/foods');
    }

    protected function checkInput()
    {
    	 return request()->validate([
    		'abbr' => 'required',
    		'name' => 'required',
            'sort' => 'required|gt:0',
    		'price' => 'required|numeric',
    		'tax_rate' => 'required|numeric',
    		'category_id' => 'required|exists:categories,id',
    	]);
    }
}
