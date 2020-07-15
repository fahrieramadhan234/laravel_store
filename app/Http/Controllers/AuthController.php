<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function postlogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        // dd($request->all());

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/admin/dashboard');
        }
        return redirect('/admin/login')->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/admin/login');
    }
}
