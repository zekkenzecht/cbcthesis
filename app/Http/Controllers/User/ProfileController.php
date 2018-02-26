<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class ProfileController extends Controller
{
    public function edit($id)
    {
    	if (Auth::check()==true) {
    		$user = User::findOrFail($id);
    		return view('profile.edit')->with('user',$user);
    	}else{
    		return redirect('/home');
    	}
    }
    public function update(Request $request,$id){
    	if (Auth::check()==true) {
    		$user = User::findOrFail($id);
    	$user = User::findOrFail($id);
        if($request->hasFile('avatar')){

        $image = $request->file('avatar');
        $fileName = uniqid().time()."_".$image->getClientOriginalName();
        $path = 'dist/users/';
        $image->move(public_path($path),$fileName);
        $user->avatar = $path.$fileName;
        }else{
        	$user->avatar = $user->avatar;
        }
       

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->save();
 
        return redirect()->back();
    	}else{
    		return redirect('/home');
    	}


    }
}
