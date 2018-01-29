<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
      
        return view('admin.users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $role = Role::get()->pluck('name');
        return view('admin.users.create')->with('role',$role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles = $request->role;
        $user = new user;
        if($request->hasFile('avatar')){

        $image = $request->file('avatar');
        $fileName = time()."_".$image->getClientOriginalName();
        $path = 'dist/users/';
        $image->move(public_path($path),$fileName);
        $user->avatar = $path.$fileName;
       }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->save();
        $user->assignRole($roles);
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
        $role = Role::get()->pluck('name');
        $user = User::find($id);
        return view('admin.users.edit',compact('role'))->with('user',$user);
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
         $roles = $request->role;
        $user =  User::findOrFail($id);
        if($request->hasFile('avatar')){

        $image = $request->file('avatar');
        $fileName = time()."_".$image->getClientOriginalName();
        $path = 'dist/users/';
        $image->move(public_path($path),$fileName);
        $user->avatar = $path.$fileName;
       }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->syncRoles($roles);
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
}
