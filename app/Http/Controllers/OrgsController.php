<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orgs;

class OrgsController extends Controller
{
    public function index()
    {
		$orgs = Orgs::all();
		$user = Auth::user();
        
		return view('orgs', [
            'orgs' => $orgs,
			'user' => $user,
        ]);
    }
}
