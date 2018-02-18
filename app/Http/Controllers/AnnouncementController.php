<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use Calendar;
class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcement = Announcement::all();
        return view('announcements.index')->with('announcement', $announcement);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $announcement = [];
      $data = Announcement::all();
      if($data->count()) {
          foreach ($data as $key => $value) {
              $announcement[] = Calendar::event(
                  $value->name,
                  true,
                  new \DateTime($value->date),
                  new \DateTime($value->date.' +1 day'),
                  null,
                  // Add color and link on event
                  [
                      'color' => 'blue',
                      'url' => "/admin/announcements/$value->id/edit",
                  ]
              );
          }
      }
      $calendar = Calendar::addEvents($announcement);
      return view('announcements.create', compact('calendar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announcement = new Announcement;
        $announcement->name = $request->announcement;
        $announcement->about = $request->about;
        $announcement->date = $request->date;
        $announcement->save();
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
      $announce = Announcement::findOrfail($id);
      $announcement = [];
      $data = Announcement::all();
      if($data->count()) {
          foreach ($data as $key => $value) {
              $announcement[] = Calendar::event(
                  $value->name,
                  true,
                  new \DateTime($value->date),
                  new \DateTime($value->date.' +1 day'),
                  null,
                  // Add color and link on event
                  [
                      'color' => 'blue',
                      'url' => "/admin/announcements/$value->id/edit",
                  ]
              );
          }
      }
      $calendar = Calendar::addEvents($announcement);
      return view('announcements.edit', compact('calendar','announce'));
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
        $announcement = Announcement::findOrfail($id);
        $announcement->name = $request->announcement;
        $announcement->about = $request->about;
        $announcement->date = $request->date;
        $announcement->save();
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
        //
    }

    public function bulkDelete()
    {

    }
}
