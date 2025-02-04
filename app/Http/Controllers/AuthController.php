<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login'); // Ensure this matches the view file name
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('pages.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }


    public function logout(Request $request){
        Auth::logout(); 

        // $request->session()->invalidate(); 
        // $request->session()->regenerateToken(); 

        return redirect('/login');
        // return view('pages.login');
    }
    
}
