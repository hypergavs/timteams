<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Http\Requests\StorePlayer;
use App\Http\Requests\UpdatePlayer;


class PlayerController extends Controller
{
    public function index(){
        return Player::all();
    }

    public function store(StorePlayer $request){
        $player = Player::create([
            'player_name' => $request['player_name'],
            'team_id' => $request['team']
        ]);

        return response()->json(compact('player'), 200);
      
    }


    public function update(UpdatePlayer $request){
        $player = Player::findOrFail($request['id']);
        $player->player_name = $request['player_name'];
        $player->team_id = $request['team'];
        $player->save();

        return response()->json(compact('player'), 200);
        
    }

    public function delete(Request $request){
        $req = $request->all();
        $player = Player::findOrFail($req['id']);
        $player->delete();
    }
}
