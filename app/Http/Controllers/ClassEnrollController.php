<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Classes;
use DB;
class ClassEnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::select(DB::raw('SELECT *
        FROM classes as cls INNER JOIN userclasses as ucls
        ON cls.id = ucls.class_id
        INNER JOIN users as us ON us.id = ucls.user_id'));
        $class = Classes::all();
        return view('classes.enrollment.index')
        ->with('user',$user)
        ->with('class',$class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $classExist = DB::table('userclasses')->where('class_id','=',$request->class)->where('user_id','=',$id)->count();
        if ($classExist > 0) {
            
        }else{
            DB::insert('insert into userclasses (class_id, user_id,status) values (?, ?,?)', [$request->class, $id,'on-going']);
        }
      
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
    public function destroy(Request $reuquest,$id)
    {
        
    }
}
