<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_key extends Model
{
    public function room(){
        return $this->belongsTo('App\room');
    }
}
