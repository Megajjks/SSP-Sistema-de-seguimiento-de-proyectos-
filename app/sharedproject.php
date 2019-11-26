<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sharedproject extends Model
{
    protected $tabla = 'sharedprojects';
    protected $primaryKey = 'id_proyecto';
    protected $fillable = ['nombre','describcion','estado_actual','estatus','ncolaboradores','fec_ini','fec_fin'];

    protected $appends = ['slug'];

    //relaciones
    public function shareActivity()
    {
        return $this->hasMany('App\sharedactivity');
    }
    public function colaboradores()
    {
        return $this->hasMany('App\Colaborador');
    }
    public function getSlugAttribute(){
        return route('proyectoasig.view', $this->id_proyecto);
    }
}
