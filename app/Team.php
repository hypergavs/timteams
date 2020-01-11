<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Player;
use App\Coach;

class Team extends Model
{

    protected $guarded = [];

    public function player(){
        $this->hasMany(Player::class);
    }

    public function coach(){
        $this->belongsTo(Coach::class);
    }

}
