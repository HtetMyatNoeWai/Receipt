<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login
    public function loginPage(){
        return view('login');
    }

    //register
    public function registerPage(){
        return view('register');
    }

    //dashboard
    public function dashboard(){
        if(Auth::user()->role=='admin')
        {
            return redirect()->route('auth#category');
        }
            return redirect()->route('user#home');

    }
}
