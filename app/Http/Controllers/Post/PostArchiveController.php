<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
class PostArchiveController extends Controller
{

    public function index()
    {   
        $post = Post::where('archive', '=' ,1)->get();
        return view('posts.archives')->with('post',$post);
    }
    //--Archiving Post--//
    public function update(Request $request)
    {
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
    //--end--//

    public function bulkChange(Request $request){

        foreach ($request->input('postid') as $key => $value) {
            $post = Post::findOrFail($value);
            if ($post->archive == true) {
            $post->archive = false;
                $post->save();
            } else {
            $post->archive = true;
                $post->save();
            }
        }
       
        
        return redirect()->back();
    }
}

