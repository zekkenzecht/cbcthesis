<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class PagesController extends Controller
{
    public function dashboard()
    	{
    	if (Auth::check() == true) {
    	return view('admin.dashboard');
    	}
    	else
    	{
    		return redirect('/home');
    	}
    	
    }
}
