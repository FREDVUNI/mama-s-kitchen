<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function admins(){
        $user = \App\User::all();
        return view('admin.admins',compact('user'));
    }
    public function register(){
        $data = request()->validate([
            'name' => 'required|max:10',
            'email' => 'email|required',
            'password' => 'required|min:8',
            'password_confirmation' =>'required',
        ]);
        return view('auth.register');
    }
    public function edit(\App\User $user){
        return view('admin.admin-role',compact('user'));
    }
    public function update(\App\User $user){
        $data = request()->validate([
            'name' => 'required|max:10',
            'userType' => 'required',
        ]);
        
        $user->update($data);
        return redirect('admins')->with('success','user data has been changed.');
    }
    public function destroy(\App\User $user){
        $user->delete();
        return redirect('admins')->with('success','user data has been deleted.');
    }
}
