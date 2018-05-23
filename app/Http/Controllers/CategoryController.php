<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function create()
    {
    	return view('categories.create');
    }

    public function store(Request $request)
    {
    	if ($request->has('name')) {
	    	$category = new Category;
	    	$category->name = $request->name;
	    	$category->save();
	    	flash('Category added.')->success()->important();
	    	return redirect()->back();
    	} else {
    		flash('Insert the name of the category.')->important();
    		return redirct()->back();
    	}
    	
    }
}
