<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use DB;
use App\User;
use Auth;

class PostRequestController extends Controller
{
    //--Pending Post Request--//
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $post = Post::where('status','=','for-approval')->get();
        return view('posts.requests.index')
        ->with('post',$user->post)
        ->with('all',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->status = 'for-approval';
        $post->slug = str_slug($request->title, '-');
        $post->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function approval(Request $request, $id)
    {
         $post = Post::findOrFail($id);
         $post->status = $request->approval;
         $post->save();
         return redirect()->back();
    }
}
    