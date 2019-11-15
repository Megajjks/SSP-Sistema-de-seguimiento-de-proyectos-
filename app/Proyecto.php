<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $tabla = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    protected $fillable = ['nombre','describcion','estado_actual','estatus','ncolaboradores','fec_ini','fec_fin'];

    //relaciones
    public function actividades()
    {
        return $this->hasMany('App\Actividad');
    }
    public function colaboradores()
    {
        return $this->hasMany('App\Colaborador');
    }
    public function users()
    {
        return $this->belongToMany('App\Proyecto');
    }

}
