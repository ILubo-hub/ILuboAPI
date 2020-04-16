<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    public function team(){
        return $this->belongsTo('App\team');
    }
}
