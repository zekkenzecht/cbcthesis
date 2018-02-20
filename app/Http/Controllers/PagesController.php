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
            $Assimilation = Assimilation::all();
    	return view('admin.dashboard');
    	}
    	else
    	{
    		return redirect('/home');
    	}
    	
    }
}
