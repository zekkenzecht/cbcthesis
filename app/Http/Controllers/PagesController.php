<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Assimilation;
class PagesController extends Controller
{
    public function dashboard()
    	{
    	if (Auth::check() == true) {
        $assimilation = Assimilation::all();
    	return view('admin.dashboard')->with('assimilation',$assimilation);
    	}
    	else
    	{
    		return redirect('/home');
    	}
    	
    }
}
