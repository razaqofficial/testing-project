<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function createUser(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'password' => 'required'
        ]);
        $userData = $request->only('name','email','password');
        User::create($userData);
        return back()->with('success','User created successfully');
    }


    public function deleteUser(Request $request)
    {
        User::destroy($request->user_id);
        return back()->with('success','User deleted successfully');
    }

}
