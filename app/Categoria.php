<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function avisos(){
        return $this->hasMany('App\Aviso');
    }
}
