<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Site;

use Auth;

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
        $workingSite->address = $request->address;
        $workingSite->name = $request->name;
    	$workingSite->user_id = Auth::id();
        $workingSite->description = $request->description;
        $workingSite->starting_date = $request->starting_date;
        $workingSite->lat = $request->lat;
    	$workingSite->lng = $request->lng;
        $workingSite->save();
        flash('Site created')->success();

        return redirect()->back();
    }

    public function show($id)
    {
        $workSite = Site::find($id);
        $photos = $workSite->photos;
        return view('sites.single', ['workSite' => $workSite, 'photos' => $photos]);
    }
}
