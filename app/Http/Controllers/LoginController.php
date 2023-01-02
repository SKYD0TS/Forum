<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }
    public function loginUser(Request $acc)
    {
        $credential = $acc->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credential)) {
            $acc->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        return back()->with('loginError', 'Username or Password is inccorrect');
    }

    public function logoutUser(Request $acc)
    {
        Auth::logout();

        $acc->session()->invalidate();

        $acc->session()->regenerateToken();
        return redirect('/posts');
    }
}
