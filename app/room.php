<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    public function teams(){
        return $this->belongsToMany(
            'App\teams',
            'room_teams', //intermediate table
            'room_id', //actual model foreign ley
            'team_id' //foreign key that reference
        );
    }

    public function user(){
        return $this->belongsTo('App\user');
    }

    public function temp_keys(){
        return $this->hasMany('App\room');
    }
}
