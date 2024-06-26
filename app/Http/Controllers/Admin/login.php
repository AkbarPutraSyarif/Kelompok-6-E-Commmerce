<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class login extends Controller
{
    private const ADMIN_EMAIL = 'admin@gmail.com';
    private const ADMIN_PASSWORD = '123456';
    
    public function loginAdmin()
    {
      return view('admin/loginadmin');
    }

    public function dashboard()
    {
      return view('admin/dashboard');
    }

    public function masukDashboard(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'password' => 'required',
        ],[
            'Email.required'=>'Harus diisi !!!',
            'Email.email'=> 'Format email yang Anda masukkan tidak benar, gunakan "@"',
            'password.required' => 'Harus diisi',

        ]);
        $email = $request->input('Email');
        $password = $request->input('password');

        if ($email === self::ADMIN_EMAIL && $password === self::ADMIN_PASSWORD) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->withErrors([
                'error' => 'Email Salah / Password salah',
            ]);
        }
    }
}
