<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	return view('category.index', compact('categories'));
    }

    public function edit(Category $category)
    {
    	return view('category.edit', compact('category'));
    }

    public function update(Category $category)
    {
    	$data = request()->validate([
    		'name' => 'required',
    		'color' => 'required'
    	]);
    	$category->update($data);
    	return $this->index();
    }

    public function destroy(Category $category)
    {
    	$category->foods()->update(['category_id' => 0]);
    	$category->delete();
    	return $this->index();
    }

    public function create()
    {
    	return view('category.create');
    }

    public function store()
    {
    	$data = request()->validate([
    		'name' => 'required',
    		'color' => 'required',
    		'job' => 'required',
    	]);
    	Category::create($data);
    	return $this->index();
    }
}
