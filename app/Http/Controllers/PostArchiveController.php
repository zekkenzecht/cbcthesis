<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostArchiveController extends Controller
{
    public function update(Request $request){

    	
    	$post = Post::findOrFail($request->id);
    		if ($post->archive == true) {
    		$post->archive = false;
    			$post->save();
	    	} else {
	    	$post->archive = true;
	    		$post->save();
	    	}
    	
    	return redirect()->back();
    }
}
