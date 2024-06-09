<?php

namespace App\Http\Controllers\layout;

use App\Http\Controllers\Controller;
use App\Models\layout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;

class controllerLogin extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('registrasi');
    }

    public function registerPost(Request $request){
        $request->validate([
            'Email' => 'required|email|min:3|unique:register,Email',
            'password' => 'required',
            'check-password' => 'required|same:password',
        ],[

            'Email.required'=>'Required field',

            'Email.min'=>'minimum of 3 character',
            'Email.email'=> 'invalid email',
            'password.required' => 'Required field',
            'check-password.required' => 'Required field',
            'check.password.same' => 'invalid password or email',

        ]);

        $data =[
            'Email' => $request->input('Email'),
            'password' => bcrypt($request->input('password')),
            'check-password' => bcrypt($request->input('check-password'))
        ];

        layout::create($data);

        return redirect('/');

    }

    public function loginPost(Request $request){
        $request->validate([
            'Email' => 'required|email|min:3|Email',
            'password' => 'required',
        ],[

            'Email.required'=>'Required field',
            'Email.min'=>'Minimum of 3 Character',
            'Email.email'=> 'Enter a valid e-mail address',
            'password.required' => 'Required field',
        ]);
        $credentials = [
            'Email' => $request->input('Email'),
            'password' => $request->input('password'),
        ];

        $user = layout::where('Email', $credentials['Email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);

            // Check if the user is an admin
            if ($credentials['Email'] === 'Admin@gmail.com' && $credentials['password'] === '123456') {
                return redirect('/admin');
            }

            return redirect('/home');
        } else {
            return redirect()->back()->withErrors(['Invalid Email or Password']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('Berhasil Logout');
    }
}

