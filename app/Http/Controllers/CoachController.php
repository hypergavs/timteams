<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coach;
use App\Http\Requests\StoreCoach;
use App\Http\Requests\UpdateCoach;

class CoachController extends Controller
{
    public function index(){
        return Coach::all();
    }


    public function store(StoreCoach $request){
        $coach = Coach::create([
            'coach_name' => $request['coach_name'],
            'type'  => $request['type'],
            'team_id' => $request['team']
        ]);

        return response()->json(compact('coach'), 200);
      
    }


    public function update(UpdateCoach $request){
        $coach = Coach::findOrFail($request['id']);
        $coach->coach_name = $request['coach_name'];
        $coach->type = $request['type'];
        $coach->team_id = $request['team'];
        $coach->save();

        return response()->json(compact('coach'), 200);
        
    }

    public function delete(Request $request){
        $req = $request->all();
        $coach = Coach::findOrFail($req['id']);
        $coach->delete();
    }
}
