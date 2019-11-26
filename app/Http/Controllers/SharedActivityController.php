<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //para traer base de datos
use App\sharedactivity; //importamas el modelo al que estara vinculado

class SharedActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = sharedactivity::all();
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
        $actividad = new sharedactivity();
        $actividad->titulo = $request->titulo;
        $actividad->descripcion = $request->descripcion;
        $actividad->prioridad = $request->prioridad;
        //$actividad->estado = "En progreso";
        $actividad->colaborador = $request->colaborador;
        $actividad->fec_exp = $request->fec_exp;
        $actividad->hrs_exp = $request->hrs_exp;
        //llaves foraneas
        $actividad->id_proyecto = 2;
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
        $actividad = sharedactivity::findOrFail($request->id_actividad);
        $actividad->titulo = $request->titulo;
        $actividad->descripcion = $request->descripcion;
        $actividad->prioridad = $request->prioridad;
        $actividad->estado = $request->estado;
        $actividad->colaborador = $request->colaborador;
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
        $actividad = \App\sharedactivity::find($id);
        $actividad->delete();
        return response()->json('successfully deleted');
    }
    public function delete($id)
    {
        $actividad = \App\sharedactivity::find($id);
        $actividad->delete();
        return response()->json(null,204);
    }
}
