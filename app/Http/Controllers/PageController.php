<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller

{
    public function welcome(Request $request) {
        if($request->user()) {
            return redirect('/artwork');
        }
        return view('layouts.mainGallery');
    }
    /**
	*
	*/
    public function about() {
        return 'This page should have a little bio';
    }

    public function gallery() {
        return 'This page should have a little gallery';
    }
    /**
	*
	*/
}
