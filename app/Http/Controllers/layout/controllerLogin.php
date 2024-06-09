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

            'Email.required'=>'Masukkan email yang Anda miliki',
            'Email.min'=>'Email yang Anda masukkan terlalu sedikit (Minimal 3)',
            'Email.email'=> 'Format email yang Anda masukkan tidak benar, gunakan "@"',
            'password.required' => 'Masukkan kata sandi yang Anda miliki',
            'check-password.required' => 'Masukkan juga kata sandi Anda disini',
            'check.password.same' => 'Kata sandi dan konfirmasi Anda tidak sama'
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
            return redirect()->back()->withErrors(['Email atau Password Anda Salah']);
        }
    }
}
