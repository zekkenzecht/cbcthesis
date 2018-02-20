<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Classes;
use App\ClassSchedules;
use DB;
use Auth;
class ClassesRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::where('user_id','=',Auth::id())->get();
        return view('classes.requests.index')->with('classes',$classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $classes = [];
        $data = ClassSchedules::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $classes[] = Calendar::event(
                    $value->schedule,
                    true,
                    new \DateTime($value->schedule),
                    new \DateTime($value->schedule.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => 'blue',
                        'url' => "/admin/classes/$value->id/edit",
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($classes);
        return view('classes.requests.create', compact('calendar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       try {
        DB::beginTransaction();
         $classes = new Classes;
        $date = date($request->date);
        $classes->classname = $request->name;
        $classes->description = $request->description;
        $classes->numberofsessions = $request->sessions;
        $classes->status = 'for-approval';
        $classes->user_id = Auth::id();
        $classes->save();
        $lastId = DB::getPdo()->lastInsertId();
         $firstSched = array(
            'class_id' => $lastId,
            'schedule' => $date,
            );
            ClassSchedules::create($firstSched);
   
        for ($i=$request->sessions; $i != 1 ; $i--)   { 
         
            $sched = strtotime("+7 day",strtotime($date));
            $date = date('Y-m-d',$sched);
            $schedule = array(
            'class_id' => $lastId,
            'schedule' => $date,
            );
            ClassSchedules::create($schedule);
            DB::commit();
          }
           
       } catch (MySQLException $e) {
           DB::rollBack();
       }
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
        $classes = [];
         $class = Classes::findOrFail($id);
        $data = ClassSchedules::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $classes[] = Calendar::event(
                    $value->schedule,
                    true,
                    new \DateTime($value->schedule),
                    new \DateTime($value->schedule.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => 'blue',
                        'url' => "/admin/classes/$value->id/edit",
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($classes);
        return view('classes.requests.edit', compact('calendar','class'));
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
          $classes = Classes::findOrFail($id);
        $date = date($request->date);
        $classes->classname = $request->name;
        $classes->description = $request->description;
        $classes->numberofsessions = $request->sessions;
        $classes->save();
        DB::table('classschedules')->where('class_id','=',$id)->delete();   
        $data = array(
            'class_id' => $id,
            'schedule' => $date,
            );
        ClassSchedules::create($data);

        for ($i=$request->sessions; $i != 1 ; $i--)   { 
         
            $sched = strtotime("+7 day",strtotime($date));
            $date = date('Y-m-d',$sched);
            $schedule = array(
            'class_id' => $id,
            'schedule' => $date,
            );
            ClassSchedules::create($schedule);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();
        DB::table('classschedules')->where('class_id','=',$id)->delete();
    }

    public function bulkDelete(Request $request)
    {


    }
}
