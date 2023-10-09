<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login', [
            'title' => 'Login'
        ]);
    }
    
    public function login(){
        $cred = request()->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        $remember = request()->input('remember');
        
        if (Auth::attempt($cred,$remember)) {
            request()->session()->regenerate();

            return redirect()->intended('/produk');
        }

        return back()->with('loginError','Email atau Password salah!');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
