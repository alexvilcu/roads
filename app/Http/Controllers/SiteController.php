<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Site;

class SiteController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
    	$workingSites = Site::all();
    	return view('sites.index', ['sites' => $workingSites]); 
    }

    public function create()
    {
    	return view('sites.create');
    }

    public function store(Request $request)
    {
    	$workingSite = new Site;
    	$workingSite->name = $request->name;
    	$workingSite->description = $request->description;
    }
}
