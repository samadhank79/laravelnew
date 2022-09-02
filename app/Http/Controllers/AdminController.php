<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbUser;
class AdminController extends Controller
{
    function Login(Request $request){
        return view('Admin.Login');
    }
    function Register(Request $request){

        if($request->input('register')){
            $request->validate([
                'name' => 'required|regex:/^[a-zA-Z]+$/u',
                'email' => 'required|unique:db_users',
                'passwd' => 'required|min:8|regex:/[a-z]/',
                'designation' => 'required',
            ]);
            $user = new DbUser;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('passwd');
            $user->designation = $request->input('designation');
            $user->save();
        }

        return view('Admin.Register');
    }
    function Home(Request $request){
        return view('Admin.Home');
    }
}
