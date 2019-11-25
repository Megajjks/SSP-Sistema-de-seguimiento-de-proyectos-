<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sharedactivity extends Model
{
    protected $tabla = 'sharedactivities';
    protected $primaryKey = 'id_actividad';
    protected $fillable = ['id_colaborador','id_proyecto','titulo','descripcion','prioridad','estado', 'colaborador','fec_exp','hrs_exp'];

    //relaciones
    public function sharedProject()
    {
        return $this->belongsTo('App\sharedproject');
    }
    
    public function colaborador()
    {
        return $this->hasMany('App\Colaborador');
    }

}
