<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function Login(Request $request){
        return view('Admin.Login');
    }
    function Register(Request $request){
        return view('Admin.Register');
    }
    function Home(Request $request){
        return view('Admin.Home');
    }
}
