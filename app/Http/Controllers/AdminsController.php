<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminsController extends Controller
{
    public function index()
    {
		$admins = Admin::all();
		$user = Auth::user();
        
		return view('admins', [
            'admins' => $admins,
			'user' => $user,
        ]);
    }
}
