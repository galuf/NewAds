<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function avisos(){
        return $this->belongsToMany('App\Aviso');
    }
}
