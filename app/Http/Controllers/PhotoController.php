<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

use App\Photo;

class PhotoController extends Controller
{
    public function addSiteImage(Request $request, $siteId)
    {
    	if ($request->hasFile('photo')) {
    		$requestImage = $request->file('photo');
	    	$filename = time() . $requestImage->getClientOriginalName();
	    	Image::make($requestImage)->save(public_path('/uploads/photos/' . $filename));
	    	$photo = new Photo;
	    	$photo->path = $filename;
	    	$photo->site_id = $siteId;
	    	$photo->save();
	    	flash('Photo added')->important()->success();
	    	return redirect()->back();
    	} else {
    		flash('File not uploaded')->important();
    		return redirect()->back();
    	}
    	
    }
}
