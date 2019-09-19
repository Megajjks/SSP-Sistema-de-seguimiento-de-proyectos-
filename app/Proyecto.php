<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $tabla = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    protected $fillable = ['nombre','describcion','estado_actual','estatus','ncolaboradores','fec_ini','fec_fin'];
}
