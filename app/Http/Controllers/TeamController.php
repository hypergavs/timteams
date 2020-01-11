<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Http\Requests\TeamValidation;
use App\Http\Requests\UpdateTeam;

class TeamController extends Controller
{
    public function index(){
        return Team::all();
    }

    public function store(TeamValidation $request){
        $team = Team::create([
            'team_name' => $request['team_name']
        ]);

        return $team;
        
    }


    public function update(UpdateTeam $request){
        
        $team = Team::findOrFail($request['id']);
        $team->team_name = $request['team_name'];
        $team->save();

        return response()->json(compact('team'), 200);
        
    }

    public function delete(Request $request){
        $req = $request->all();
        $team = Team::findOrFail($req['id']);
        $team->delete();
    }


}
