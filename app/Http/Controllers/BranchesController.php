<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $branches = Branch::all();
      // DB::update('update users set votes = 100 where name = ?', ['John'])
      $branches2 = Branch::all();
      return view('branches.index',compact('branches'))->with('branches2',$branches2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branches = new Branch;
        $branches->branchName = $request->name;
        $branches->address = $request->address;
        $branches->pastor = $request->pastor;
        $branches->service = $request->service;
        $branches->save();
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
        $branch = Branch::findOrFail($id);
        $branch->branchName = $request->name;
        $branch->address = $request->address;
        $branch->pastor = $request->pastor;
        $branch->service = $request->service;
        $branch->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branches = Branch::findOrFail($id);
        $branches->delete();
        return redirect()->back();
    }

    public function bulkDelete(Request $request)
    {
      foreach ($request->input('branchid') as $key => $value) 
      {
         $branch = Branch::findOrFail($value);
         $branch->delete();
        
      }

       return redirect()->back();
    }
}
