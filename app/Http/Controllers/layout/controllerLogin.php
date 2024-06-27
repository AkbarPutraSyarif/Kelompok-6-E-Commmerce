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
            'password' => 'required|min:3',
            'check-password' => 'required|same:password',
        ],[
            'Email.required'=>'Required Field',
            'Email.min'=>'Minimum of 3 Character',
            'Email.email'=> 'Enter a valid e-mail address',
            'password.required' => 'Required Field',
            'password.min' => 'Minimum of 3 Character',
            'check-password.required' => 'Required Field',
            'check.password.same' => 'check password and password must the be same'

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
            'Email.required'=>'Masukkan email yang Anda miliki',
            'Email.min'=>'Email yang Anda masukkan terlalu sedikit (Minimal 3)',
            'Email.email'=> 'Format email yang Anda masukkan tidak benar, gunakan "@"',
            'password.required' => 'Masukkan kata sandi yang Anda',

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
            return redirect()->route('loginPost')->withErrors(['error'=>'Email atau Password Anda Salah']);

        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/')->with('Berhasil Logout');
    }

}