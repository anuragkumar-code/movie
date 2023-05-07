<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerView(){
        return view ('register');
    }

    public function signinView(){
        return view ('login');
    }

    public function registered(Request $request){
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|regex:/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'password' => 'required',

        ],[
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',

        ]);

        $name = $request->name;
        $email = $request->email;
        $password = HASH::make($request->password);

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        return redirect('/sign-in')->withSuccess('You have been registered now, Login here to proceed.');
    }

    public function signedIn(Request $request){
        request()->validate([
            'email' => 'required|email|regex:/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'password' => 'required|min:4',

        ],[
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',

        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('dashboard');
       } else {
            return back()->with('error', 'Incorrect Email or Password !');
       }
    }

    public function logout(){
        session()->flush();
        return redirect('/sign-in');
    }

    public function dashboardView(){
        return view ('dashboard');
    }
}
