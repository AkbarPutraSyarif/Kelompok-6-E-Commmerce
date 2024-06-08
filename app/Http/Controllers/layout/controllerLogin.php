<?php

namespace App\Http\Controllers\layout;

use App\Http\Controllers\Controller;
use App\Models\layout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'check-password' => 'required|same:password'
        ],[
            'Email.required'=>'Required Field',
            'Email.min'=>'Minimum of 3 Character',
            'Email.email'=> 'Enter a valid e-mail address',
            'password.required' => 'Required Field',
            'check-password.required' => 'Required Field',
            'check.password.same' => 'Required Field'
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
            'Email.required'=>'Required Field',
            'Email.min'=>'Minimum of 3 Character',
            'Email.email'=> 'Enter a valid e-mail address',
            'password.required' => 'Required Field',
        ]);
        $credentials = [
            'Email' => $request->input('Email'),
            'password' => $request->input('password'),
        ];

        $user = layout::where('Email', $credentials['Email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect('/home');
        } else {
            return redirect()->back()->withErrors(['Email atau Password Anda Salah']);

        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('Berhasil Logout');
    }
}
