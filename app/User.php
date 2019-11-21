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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //Relaciones con colaborador
    public function colaboradores()
    {
        return $this->hasMany('App\Colaborador');
    }
    public function proyectos()
    {
        return $this->belongsToMany('App\ProyectoCompartido'); 
        //proyecto-usuario (pryecto_id, user_id)
    } 
}
