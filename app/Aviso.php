<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    public function usuario(){
        return $this->belongsTo('App\User');
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function distrito(){
        return $this->belongsTo('App\Distrito');
    }
}
