<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function provincias(){
        return $this->hasMany('App\Provincia');
    }

    public function regiones(){
        return $this->hasMany('App\Region');
    }
}
