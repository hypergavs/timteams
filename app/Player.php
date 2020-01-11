<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;

class Player extends Model
{
    protected $guarded = [];
    //
    public function team(){
        $this->belongsTo(Team::class);
    }
}
