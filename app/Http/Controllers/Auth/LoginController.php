<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('nickname', 'password');

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна
            $user = Auth::user();

            if ($user->lvl === 0) {
                Auth::logout(); // Выход из аккаунта
                return back()->withErrors(['inactive' => 'Ваш аккаунт не активирован.']);
            }

            return redirect()->intended('/');
        }

        // Аутентификация не удалась
        return back()->withErrors([
            'nickname' => 'Неверное имя пользователя или пароль.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
