<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $tabla = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    protected $fillable = ['nombre','describcion','estado_actual','estatus','ncolaboradores','fec_ini','fec_fin'];

    protected $appends = ['slug'];

    //relaciones
    public function actividades()
    {
        return $this->hasMany('App\Actividad');
    }
    public function colaboradores()
    {
        return $this->hasMany('App\Colaborador');
    }
    public function getSlugAttribute(){
        return route('proyectopriv.view', $this->id_proyecto);
    }

}
