<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

use Photo;

class PhotoController extends Controller
{
    public function addSiteImage(Request $request, $img, $siteId)
    {
    	if ($request->hasFile($img)) {
    		$requestImage = $request->file($img);
	    	$filename = time() . $requestImage->getClientOriginalName();
	    	Image::make(Input::file($img))->save(public_path('/uploads/photos/'));
	    	$photo = new Photo;
	    	$photo->path = $filename;
	    	$photo->site_id = $siteId;
    	} else {
    		flash('File not uploaded');
    	}
    	
    }
}
