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
        $ongoingWorkingSites = Sites::where('ending_date', '!=', null)->get();
    	return view('sites.index', ['sites' => $workingSites, 'ongoingWorkingSites' => $ongoingWorkingSites]); 
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

    public function show(Request $request, $id)
    {
        $workSite = Site::find($id);
        if (Photo::where('site_id', $id)->exists()) {
            $activeCarouselPhoto = Photo::where('site_id', $id)->first();
            $photos = $workSite->photos()->where('id', '!=', $activeCarouselPhoto->id)->get();
            return view('sites.single', ['workSite' => $workSite, 'photos' => $photos, 'activeCarouselPhoto' => $activeCarouselPhoto]);
        } else {
             return view('sites.single', ['workSite' => $workSite, 'photos' => null, 'activeCarouselPhoto'=> null]);
        }
    }

    public function edit(Site $site)
    {
        $categories = Category::all();
        // dd($site->category->name);
        return view('sites.edit', ['site' => $site, 'categories' => $categories]);
    }
}
