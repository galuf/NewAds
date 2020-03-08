<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public function distritos(){
        return $this->hasMany('App\Distrito');
    }

    public function region(){
        return $this->belongsTo('App\Region');
    }
}
