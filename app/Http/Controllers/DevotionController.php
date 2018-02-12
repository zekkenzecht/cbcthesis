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
        $devotion->topic = $request->topic;
        $devotion->passage = $request->passage;
        $devotion->content = $request->content;
        $devotion->date = $request->date;
        $devotion->save();
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
        $devotion->topic = $request->topic;
        $devotion->passage = $request->passage;
        $devotion->content = $request->content;
        $devotion->date = $request->date;
        $devotion->save();
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
        $devotion = Devotion::findOrfail($id);
        $devotion->delete();
    }

    public function bulkDelete(Request $request)
    {
        foreach ($request->input('devotionid') as $key => $value) {
                DB::table('devotions')->where('id', '=', $value)->delete();
            }
            return redirect()->back();

    }
}
