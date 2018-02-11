<?php

namespace App\Http\Controllers\Post;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Controller;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::where('status', '=', 'approved')->where('archive','=',0)->get();
        $archives = Post::where('status', '=', 'approved')->where('archive','=',1)->get();
        return view('posts.index',compact('archives'))->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        $post->status = 'approved';
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
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
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
        $post = Post::findOrFail($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
