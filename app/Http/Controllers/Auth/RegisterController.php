<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string|max:255|unique:site.users,nickname',
            'email' => 'required|string|email|max:255|unique:site.users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::connection('site')->table('users')->insert([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'lvl' => 0,
        ]);
        

        return redirect()->route('login')->with('success', 'Registration successful!');
    }
}
