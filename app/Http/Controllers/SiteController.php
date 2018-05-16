<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Site;

use App\Category;

use App\Photo;

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
        $categories = Category::all();
    	return view('sites.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {   
        if (Site::where('address', $request->address)->exists()) {
        flash('Site already exists.')->important();
        return redirect()->back();
    } else {

            $workingSite = new Site;
            $workingSite->address = $request->address;
            $workingSite->name = $request->name;
            $workingSite->user_id = Auth::id();
            $workingSite->category_id = $request->category;
            $workingSite->description = $request->description;
            $workingSite->starting_date = $request->starting_date;
            $workingSite->lat = $request->lat;
            $workingSite->lng = $request->lng;
            $workingSite->save();
            flash('Site created')->success();

            return redirect()->back();
        }
    	
    }

    public function show($id)
    {
        $workSite = Site::find($id);
        $activeCarouselPhoto = Photo::where('site_id', $id)->first();
        // dd($activeCarouselPhoto);
        $photos = $workSite->photos()->where('id', '!=', $activeCarouselPhoto->id)->get();
        return view('sites.single', ['workSite' => $workSite, 'photos' => $photos, 'activeCarouselPhoto' => $activeCarouselPhoto]);
    }
}
