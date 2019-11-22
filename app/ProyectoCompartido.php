<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoCompartido extends Model
{
    protected $tabla = 'proyecto_compartidos';
    protected $primaryKey = 'id_proyecto';
    protected $fillable = ['nombre','describcion','estado_actual','estatus','ncolaboradores','fec_ini','fec_fin'];

    //relaciones
   public function actividades()
   {
       return $this->belongsTo('App\Actividad');
   }
   public function colaboradores()
   {
       return $this->hasMany('App\Colaborador');
   }
   public function users()
   {
       return $this->belongsTo('App\User');
   }
}
