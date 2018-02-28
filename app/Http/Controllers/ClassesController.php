<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Calendar;
use App\Classes;
use App\ClassSchedules;
use DB;
use Auth;
class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::where('status','=','approved')->get();

        $declined = Classes::where('status','=','declined')->get();

        $crequest = Classes::where('status','=','for-approval')->get();

        $all = Classes::all();
        return view('classes.index')

        ->with('classes',$classes)

        ->with('declined',$declined)

        ->with('crequest',$crequest)

        ->with('all',$all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = [];
        $data = DB::select(DB::raw("SELECT *
        FROM classes as cl INNER JOIN classschedules as cls
        ON cl.id = cls.class_id WHERE cl.status = 'approved'"));
    
            foreach ($data as $key => $value) {
                $classes[] = Calendar::event(
                    $value->classname,
                    true,
                    new \DateTime($value->schedule),
                    new \DateTime($value->schedule.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => 'blue',
                        'url' => "/admin/classes/$value->class_id/edit",
                    ]
                );
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
        $this->validate($request,[
            'date'=>'required',
            'name'=>'required|min:5|max:255',
            'description'=>'required|min:5|max:4096',
            'sessions'=>'required',
            'date' => 'required',
            'enddate' => 'required',
            'time' => 'required'
        ]);

        $classes = new Classes;
        $date = date($request->date);
        $classes->classname = $request->name;
        $classes->description = $request->description;
        $classes->numberofsessions = $request->sessions;
        $classes->status = 'approved';
        $classes->user_id = Auth::id();
        $startdate = date_create($request->date.' '.$request->time);
        $enddate = date_create($request->enddate.' '.$request->time);
        $classes->startdate = date_format($startdate,'Y-m-d H:i:s');
        $classes->end_date = date_format($enddate,'Y-m-d H:i:s');
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
            $schedules = date_create($date.''.$request->time);
            $schedule = array(
            'class_id' => $lastId,
            'schedule' => date_format($schedules,'Y-m-d H:i:s')
            );
            ClassSchedules::create($schedule);
            DB::commit();
          }
          $request->session()->flash('message','You have successfully added a post !');
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
         $classes = [];
         $class = Classes::findOrFail($id);
        $data = DB::select(DB::raw('SELECT *
        FROM classes as cl INNER JOIN classschedules as cls
        ON cl.id = cls.class_id'));
            foreach ($data as $key => $value) {
                $classes[] = Calendar::event(
                    $class->classname,
                    true,
                    new \DateTime($value->schedule),
                    new \DateTime($value->schedule.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => 'blue',
                        'url' => "/admin/classes/$value->class_id/edit",
                    ]
                );
            }
        
        $calendar = Calendar::addEvents($classes);
        return view('classes.edit', compact('calendar','class'));
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
           return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $class = Classes::findOrFail($id);
        $request->session()->flash('message','You have successfully declined class'.$class->classname. ' !');
        $class->status = 'declined';
        $class->save();
        return redirect()->back();
    }

    public function bulkDecline(Request $request){
       switch ($request->change) {
           case 'approve':
        foreach ($request->input('classid') as $key => $value) {
        $class = Classes::findOrFail($value);
        $class->status = 'approved';
        $class->save();

        }
               break;

           case 'decline':
        foreach ($request->input('classid') as $key => $value) {
        $class = Classes::findOrFail($value);
        $class->status = 'declined';
        $class->save();

        }
               break;

       }
       

        $request->session()->flash('message','You Have Successfully declined all checked !');

        return redirect()->back();
    }

    public function bulkApprove(Request $request){

        foreach ($request->input('classid') as $key => $value) {
        $class = Classes::findOrFail($value);
        $class->status = 'approved';
        $class->save();

        }

        $request->session()->flash('message','You Have Successfully Approved all checked !');

        return redirect()->back();
    }

    public function calendar(){

        $classes = [];
        $data = DB::select(DB::raw("SELECT *
        FROM classes as cl INNER JOIN classschedules as cls
        ON cl.id = cls.class_id WHERE cl.status = 'approved'"));
    
            foreach ($data as $key => $value) {
                $classes[] = Calendar::event(
                    $value->classname,
                    true,
                    new \DateTime($value->schedule),
                    new \DateTime($value->schedule),
                    null,
                    // Add color and link on event
                    [
                        'color' => 'blue',
                    ]
                );
            }
    
        $calendar = Calendar::addEvents($classes);
        return view('classes.calendar', compact('calendar'));
    
    }
}
