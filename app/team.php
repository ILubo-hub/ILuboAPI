<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    public function rooms(){
        return $this->belongsToMany('App\room');
    }

    public function candidates(){
        return $this->hasMany('App\candidate');
    }
}
