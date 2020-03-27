<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function aviso(){
        return $this->belongsTo('App\Aviso');
    }

    public function user(){
        return $this->belongsTo('App\User','usuario_id');
    }
}
