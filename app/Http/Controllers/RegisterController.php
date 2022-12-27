<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register now'
        ]);
    }

    public function registerUser(Request $reg)
    {
        $validated = $reg->validate([
            'name' => "required|max:255|min:4",
            'username' => "required|unique:users|max:255",
            'email' => "required|unique:users|max:255|email:dns",
            'password' => "required|min:8"
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        // $reg->Session()->flash('uuwwoooogghhh', 'Loogiiinnnn aaaaaaa');

        return view('login.index', [
            'title' => 'Login',
            'username' => $validated['username']
        ]);
    }
}