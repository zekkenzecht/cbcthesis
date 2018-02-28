<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devotion;
use Calendar;
use DB;
class DevotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devotion = Devotion::all();

        return view('devotion.index')->with('devotion',$devotion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devotions = [];

        $data = Devotion::all();

        if($data->count()) {

            foreach ($data as $key => $value) {

                $devotions[] = Calendar::event(

                    $value->topic,

                    true,

                    new \DateTime($value->date),

                    new \DateTime($value->date.' +1 day'),

                    null,
                    // Add color and link on event
                    [
                        'color' => 'blue',

                        'url' => "/admin/devotions/$value->id/edit",

                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($devotions);
        return view('devotion.create', compact('calendar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $devotion = new Devotion;

        $this->validate($request,[

            'topic' => 'required|min:5|max:40',

            'passage' => 'required|min:5|max:70',

            'content' => 'required|min:20|max:4096',

            'date' => 'required'

        ]);

        $devSet = Devotion::where('date','=',$request->date)->get();

        if ($devSet->count() == 0) {

        $devotion->topic = $request->topic;

        $devotion->passage = $request->passage;

        $devotion->content = $request->content;

        $devotion->date = $request->date;
        
        $devotion->save();

        $request->session()->flash('message','You successfully added a devotion !');

        $request->session()->flash('messages-type','success');

        return redirect()->back();

        } else{

       $request->session()->flash('message','The date you have entered is already taken! Please Select a new one');

        $request->session()->flash('messages-type','danger');

        return redirect('/admin/devotions/create');
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
         $devotions = [];
        $data = Devotion::all();
        $devotion = Devotion::findOrFail($id);
        if($data->count()) {
            foreach ($data as $key => $value) {
                $devotions[] = Calendar::event(
                    $value->topic,
                    true,
                    new \DateTime($value->date),
                    new \DateTime($value->date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => 'blue',
                        'url' => "/admin/devotions/$value->id/edit",
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($devotions);
        return view('devotion.edit', compact('calendar','devotion'));
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
         $devotion = Devotion::findOrFail($id);

        $this->validate($request,[

            'topic' => 'required|min:5|max:40',

            'passage' => 'required|min:5|max:70',

            'content' => 'required|min:20|max:4096',

            'date' => 'required'

        ]);

        $devotion->topic = $request->topic;

        $devotion->passage = $request->passage;

        $devotion->content = $request->content;

        $devotion->date = $request->date;
        
        $devotion->save();

        $request->session()->flash('message','You successfully edited devotion '.$devotion->topic.'!');

        $request->session()->flash('messages-type','success');

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
        $devotion = Devotion::findOrfail($id);

    $request->session()->flash('message',"You have successfully deleted devotion ".$devotion->topic.' !');

        $devotion->delete();

        return redirect()->back();

    }

    public function bulkDelete(Request $request)
    {
        foreach ($request->input('devotionid') as $key => $value) {
                DB::table('devotions')->where('id', '=', $value)->delete();
            }
        $request->session()->flash('message',"You have successfully deleted all selected devotions !");

            return redirect()->back();

    }
    public function calendar()
    {
        $devotions = [];

        $data = Devotion::all();

        if($data->count()) {

            foreach ($data as $key => $value) {

                $devotions[] = Calendar::event(

                    $value->topic,

                    true,

                    new \DateTime($value->date),

                    new \DateTime($value->date.' +1 day'),

                    null,
                    // Add color and link on event
                    [
                        'color' => 'blue',

                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($devotions);

        return view('devotion.calendar', compact('calendar'));
    }
}
