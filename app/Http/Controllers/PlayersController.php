<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Players;
use App\Models\Banname;
use App\Models\Log;
use App\Models\Vehicle;

class PlayersController extends Controller
{
    public function searchAndShow(Request $request)
    {
        $query = $request->input('query');
        $player = null;
        $banInfo = null;
        $logs = null;
        $vehicles = null;
        $user = Auth::user();

        if ($query) {
            $player = Players::where('NickName', $query)->first();

            if ($player) {
                $banInfo = Banname::where('Name', $player->NickName)->first();
                
                $logs = Log::where('Log', 'like', '%' . $player->NickName . '%')->orderBy('Date', 'desc')->get();

                $vehicles = Vehicle::where('Owner', $player->NickName)->get();
            }
        }

        return view('fplayer', compact('player', 'query', 'banInfo', 'user', 'logs', 'vehicles'));
    }
}
