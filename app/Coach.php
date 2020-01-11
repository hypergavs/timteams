<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;


class Coach extends Model
{
    protected $guarded = [];
    //
    public function team(){
        $this->hasMany(Team::class);
    }
    


}
