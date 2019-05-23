<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('sort')->get();
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
    		'color' => 'required',
            'sort' => 'required|gt:0',
    	]);
    	$category->update($data);
    	return redirect('/admin/categories');
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
            'sort' => 'required|gt:0',
    	]);
    	Category::create($data);
    	return $this->index();
    }
}
