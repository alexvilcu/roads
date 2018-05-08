<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

class UserController extends Controller
{
    public function show($user)
    {
		if ($user == Auth::id()) {
				$profile = User::find($user);
		    	return view('profile.view', ['profile' => $profile]);	
		    } else {
		    	flash('Profile not found')->important();
		    	return redirect()->back();
		    }    	
    }
}
