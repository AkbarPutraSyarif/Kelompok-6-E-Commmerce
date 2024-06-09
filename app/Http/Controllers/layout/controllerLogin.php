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
            'Email.required'=>'Harus diisi !!!',
            'Email.min'=>'Minimal 3',
            'Email.email'=> 'Harus format email!',
            'password.required' => 'Harus diisi !!!',
            'check-password.required' => 'Harus diisi !!!',
            'check.password.same' => 'Harus Sama !!!'
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
            'Email.required'=>'Harus diisi !!!',
            'Email.min'=>'Minimal 3 karakter',
            'Email.email'=> 'Harus format email!',
            'password.required' => 'Harus diisi !!!',
        ]);
        $credentials = [
            'Email' => $request->input('Email'),
            'password' => $request->input('password'),
        ];

        $user = layout::where('Email', $credentials['Email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect('/beranda');
        } else {
            return redirect('/')->with('Gagal', 'password atau email salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('Berhasil Logout');
    }
}
