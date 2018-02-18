<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Classes;
use App\ClassSchedules;
use DB;
class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::all();
        return view('classes.index')->with('classes',$classes);
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
                        'url' => "/admin/devotions/$value->id/edit",
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($classes);
        return view('classes.create', compact('calendar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $classes = new Classes;
        $classsched = new ClassSchedules;
        $date = date($request->date);
        $classes->classname = $request->name;
        $classes->description = $request->description;
        $classes->numberofsessions = $request->sessions;
        $classes->save();
        $lastId = DB::getPdo()->lastInsertId();
        $classsched->class_id = $lastId;
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
                        'url' => "/admin/devotions/$value->id/edit",
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($classes);
        return view('classes.create', compact('calendar'));
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

    public function bulkDelete(){

    }
}
