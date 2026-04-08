<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = Auth::user();
        return view('users.index', compact('users', 'user'));
    }

    public function edit($id)
    {
        $euser = User::findOrFail($id);
        $user = Auth::user();
        return view('users.edit', compact('euser', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = DB::connection('site')->table('users')->where('id', $id)->first();

        DB::connection('site')->table('users')->where('id', $id)->update([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'lvl' => $request->lvl,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Пользователь обновлен успешно');
    }
}
