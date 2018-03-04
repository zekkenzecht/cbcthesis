<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Assimilation;
use App\Content;
use App\User;
use App\Attendance;
class PagesController extends Controller
{
    public function dashboard()
    	{

    	if (Auth::check() == true) {
        $user = User::all()->count();
        $attendance = Attendance::where('status','=','attendee')->count();
        $incon = Attendance::where('status','=','inconsistent')->count();
        $non = Attendance::where('status','=','non-attendee')->count();
        $assimilation = Assimilation::all();
    	return view('admin.dashboard',compact('attendance','incon','non'))
        ->with('assimilation',$assimilation)
        ->with('user',$user);
    	}
    	else
    	{
    		return redirect('/home');
    	}
    	
    }

    public function homepage(){
        $slider = Content::where('type','=','homeslider')->get();
        return view('frontend.homepage')->with('slider',$slider);
    }
}
