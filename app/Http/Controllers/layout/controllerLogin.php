<?php

namespace App\Http\Controllers\layout;

use App\Http\Controllers\Controller;
use App\Models\layout;
use Illuminate\Http\Request;

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
            'Email' => 'required|min:3|unique:register,Email',
            'password' => 'required',
            'check-password' => 'required|same:password'
        ],[
            'Email.required'=>'Harus diisi !!!',
            'Email.min'=>'Minimal 3',
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
}
