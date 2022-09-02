<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DbUser;
class AdminController extends Controller
{
    function Login(Request $request){
        if($request->input('login')){
            $request->validate([
                'email' => 'required',
                'passwd' => 'required|min:8|regex:/[a-z]/',

            ]);
            $email = $request->input('email');
            $password = $request->input('passwd');
            $veryEmail =  DbUser::where('email',$email)->first();
            if($veryEmail){
                if(Hash::check($password,$veryEmail->password)){
                    if($veryEmail->designation === 'compoffice'){
                        return  redirect()->route('admin');
                    }
                }
            }
            
            
        }
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
            $user->password = Hash::make($request->input('passwd'));
            $user->designation = $request->input('designation');
            $user->save();
        }

        return view('Admin.Register');
    }
    function Home(Request $request){
        return view('Admin.Home');
    }
}
