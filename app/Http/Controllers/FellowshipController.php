<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fellowship;
use DB;
class FellowshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $approved = Fellowship::where('status','=','approved')->get();
      $declined = Fellowship::where('status','=','declined')->get();
      $frequest = Fellowship::where('status','=','for-approval')->get();
      // dd($approved,$declined,$frequest);
      return view('fellowship.index')
      ->with('approved', $approved)
      ->with('declined',$declined)
      ->with('frequest',$frequest);
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
        //
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
      $frequest = Fellowship::findOrFail($id);
      $frequest->status = 'approved';
      $frequest->save();
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
      $frequest = Fellowship::findOrFail($id);
      $frequest->status = 'declined';
      $frequest->save();
      return redirect()->back();
    }

    public function bulkDecline(Request $request){

      foreach ($request->input('fellowshipid') as $key => $value) {
        $frequest = Fellowship::findOrFail($value);
        $frequest->status = 'declined';
        $frequest->save();
      }
      return redirect()->back();
    }

    public function bulkApprove(Request $request){

      foreach ($request->input('fellowshipid') as $key => $value) {
        $frequest = Fellowship::findOrFail($value);
        $frequest->status = 'approved';
        $frequest->save();
      }
      return redirect()->back();
    }

    public function bulkChange(Request $request)
    {
        switch ($request->change) {
          case 'approve':
          foreach ($request->input('fellowshipid') as $key => $value) {
            $frequest = Fellowship::findOrFail($value);
            $frequest->status = 'declined';
            $frequest->save();
          }
            break;

          case 'declined':
          foreach ($request->input('fellowshipid') as $key => $value)
          {
            $frequest = Fellowship::findOrFail($value);
            $frequest->status = 'approved';
            $frequest->save();
          }
            break;
        }
        return redirect()->back();
      }

}
