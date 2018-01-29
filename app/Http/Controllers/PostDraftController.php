<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostDraftController extends Controller
{
    public function store(Request $request)
    {
    	$post = new Post;
        if($request->hasFile('postimage')){

        $image = $request->file('postimage');
        $fileName = time()."_".$image->getClientOriginalName();
        $path = 'img/';
        $image->move(public_path($path),$fileName);
         $post->image = $path.$fileName;
       }
        
       
        
        $post->user_id = 1;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->status = 'Approved';
        $post->slug = str_slug($request->title, '-');
        $post->save();
        return redirect()->back();
    }
}
