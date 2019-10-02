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
        return $this->hasMany('App\Actividad');
    }
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }
}
