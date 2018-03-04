<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use DB;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::all();
        return view('downloads.index')->with('files',$file);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('downloads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
      $file = $request->file('file');
      $fileName = uniqid().'_'.time().'_'.$file->getClientOriginalName();
      $fileOriginal =  $file->getClientOriginalName();
      $file->move(public_path('files'),$fileName);
      $path = public_path('files');

      $file = new File;
      $storedb = $file->create(
        [
          'path' => $fileName,
          'filename' => $fileOriginal
        ]);
          return response()->json(['success'=>$fileName]);
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
        $files = DB::table('files')->where('id', $id)->first();
        $delete = File::findOrFail($id);
        $delete->delete();
        $file = $files->path;

        $filename = public_path().'/files/'.$file;
        \File::delete($filename);
    }

    public function bulkDelete(Request $request){
        foreach ($request->input('fileid') as $key => $value) {
        $files = DB::table('files')->where('id', $value)->first();
        $delete = File::findOrFail($value);
        $delete->delete();
        $file = $files->path;

        $filename = public_path().'/files/'.$file;
        \File::delete($filename);
        }
       
    }
    
    public function download($id){
        $file = File::findOrFail($id);
        $path = $path = public_path('files/');
        $download = $path.$file->path;
        return response()->download($download);
    }
}
