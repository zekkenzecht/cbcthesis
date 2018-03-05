<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Assimilation;
use App\Enrollment;
use DB;
class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('status','=','active')->get();
        $enrollModal = User::all();
        $assimilation = Assimilation::all();
      $result = DB::select(DB::raw('SELECT *
        FROM assimilations as assim INNER JOIN Enrollments as Enr
        ON assim.id = Enr.assimilation_id
        INNER JOIN users as us ON us.id = enr.user_id'));
        return view('enrollment.index')
         ->with('user',$user)
         ->with('assimilation',$assimilation)
         ->with('enrollModal',$enrollModal)
         ->with('result',$result);
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
        $idass = $request->assimilation;
        DB::table('enrollments')->where('user_id', '=', $id)->delete();
        DB::insert('insert into enrollments (user_id, assimilation_id) values (?, ?)', [$id, $idass]);
        
       $assimUser = DB::table('assimilations_user')->where('user_id','=',$id)->where('id','=',$idass)->where('status','=','on-going')->orWhere('status','=','finished')->get();
     $assimStat = DB::table('assimilations_user')->where('status','=','on-going')->where('user_id','=',$id);

        if ($assimUser->count() == 0 AND $assimStat->count() == 0 ) {
          DB::insert('insert into assimilations_user (id, user_id,status) values (?, ?,?)', [$idass,$id,'on-going']);
          
        }else{
            
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

    public function bulkEnroll(){

    }
}
