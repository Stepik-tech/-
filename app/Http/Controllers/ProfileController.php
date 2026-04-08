<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $position = $this->getPosition($user->lvl);

        return view('profile.show', compact('user', 'position'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Старый пароль неверен.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Пароль успешно изменен.');
    }

    private function getPosition($level)
    {
        switch ($level) {
            case 1:
                return 'Технический администратор';
            case 2:
                return 'Главный технический администратор';
            case 3:
                return 'Главная администрация';
            default:
                return 'Нет данных';
        }
    }
}
