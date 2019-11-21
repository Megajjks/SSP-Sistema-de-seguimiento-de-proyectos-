<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $tabla = 'colaboradores';
    protected $primaryKey = 'id_colaborador';
    protected $fillable = ['id_proyecto','id_usuario'];

    //relaciones
    public function actividades()
    {
        return $this->belongsTo('App\Actividad');
    }
    public function proyectos()
    {
        return $this->belongsTo('App\ProyectoCompartido');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
