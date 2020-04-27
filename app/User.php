<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido','email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function avisos(){
        return $this->hasMany('App\Aviso');
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario');
    }

    //relacion de muchos a muchos
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    public function favoritos(){
        return $this->hasMany('App\Favorito');
    }

    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401,'This action is unauthorized');
    }
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if($this.roles()->where('nombre',$role)->first()){
            return true;
        }
        return false;
    }



}
