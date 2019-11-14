<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //para traer base de datos
use App\Actividad; //importamas el modelo al que estara vinculado

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = DB::table('actividads')->where('id_actividad','=',1)->get()->toJson(); //hacer una consulta ejemplo
        $actividades = Actividad::all();
        return $actividades;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new Actividad();
        $actividad->titulo = $request->titulo;
        $actividad->descripcion = $request->descripcion;
        $actividad->prioridad = $request->prioridad;
        //$actividad->estado = "En progreso";
        $actividad->fec_exp = $request->fec_exp;
        $actividad->hrs_exp = $request->hrs_exp;
        //llaves foraneas
        $actividad->id_proyecto = 1;
        $actividad->id_colaborador = 1;
        $actividad->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $actividad = Actividad::findOrFail($request->id_actividad);
        $actividad->titulo = $request->titulo;
        $actividad->descripcion = $request->descripcion;
        $actividad->prioridad = $request->prioridad;
        $actividad->estado = $request->estado;
        $actividad->fec_exp = $request->fec_exp;
        $actividad->hrs_exp = $request->hrs_exp;
        //llaves foraneas
        $actividad->id_proyecto = $request->id_proyecto;
        $actividad->id_colaborador = $request->id_colaborador;
        $actividad->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = \App\Actividad::find($id);
        $actividad->delete();
        return response()->json('successfully deleted');
    }
    public function delete($id)
    {
        $actividad = \App\Actividad::find($id);
        $actividad->delete();
        return response()->json(null,204);
    }
}
