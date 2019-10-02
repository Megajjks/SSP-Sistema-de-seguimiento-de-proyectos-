<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $tabla = 'actividades';
    protected $primaryKey = 'id_actividad';
    protected $fillable = ['id_colaborador','id_proyecto','titulo','descripcion','prioridad','estado','fec_exp','hrs_exp'];

    //relaciones
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }
    public function colaborador()
    {
        return $this->belongsTo('App\Colaborador');
    }
}
