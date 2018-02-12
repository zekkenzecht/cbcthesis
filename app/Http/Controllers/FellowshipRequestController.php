<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fellowship;
use Calendar;
class FellowshipRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fellowship = Fellowship::all();
        return view('fellowship.requests.index')->with('fellowship',$fellowship);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fellowship = [];
        $data = Fellowship::where('status','=','approved')->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $fellowship[] = Calendar::event(
                    $value->name,
                    true,
                    new \DateTime($value->date),
                    new \DateTime($value->date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => 'blue',
                        'url' => "/frequest/$value->id/edit",
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($fellowship);
        return view('fellowship.requests.create', compact('calendar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $frequest = New Fellowship;
        $frequest->name = $request->name;
        $frequest->description = $request->desc;
        $frequest->venue = $request->venue;
        $frequest->date = $request->date;
        $frequest->time = date("H:i", strtotime("$request->time"));

        $frequest->save();
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
    public function destroy($id)
    {
        //
    }

    public function bulkDelete(){

    }
}
