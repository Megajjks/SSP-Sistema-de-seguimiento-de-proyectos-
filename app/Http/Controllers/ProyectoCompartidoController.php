<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProyectoCompartido; //importamas el modelo al que estara vinculado
use Carbon\Carbon; //para el manejo de fechas actuales

class ProyectoCompartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectocompartidos = ProyectoCompartido::all(); //variable para guarda o traer todos los registros de proyecto
        return $proyectocompartidos;
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
        $fechahoy = Carbon::now(); //obtener las fechas actuales
        $proyectocompartido = new ProyectoCompartido();
        $proyectocompartido->nombre = $request->nombre;
        $proyectocompartido->describcion = $request->describcion;
        $proyectocompartido->estado_actual = 0;
        $proyectocompartido->ncolaboradores = 1;
        //$proyectocompartido->estatus = "Asignación";
        $proyectocompartido->fec_ini = $fechahoy->format('Y-m-d');
        $proyectocompartido->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyectocompartido= ProyectoCompartido::find($id);
        return $proyectocompartido;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$proyecto = Proyecto::find($id);
        //return response()->json($proyecto);
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
        $proyectocompartido = ProyectoCompatido::findOrFail($request->id_proyecto);
        $proyectocompartido->id_proyecto = $request->id_proyecto;
        $proyectocompartido->nombre = $request->nombre;
        $proyectocompartido->describcion = $request->describcion;
        $proyectocompartido->estado_actual = $request->estado_actual;
        $proyectocompartido->estatus = $request->estatus;
        $proyectocompartido->ncolaboradores = $request->ncolaboradores;
        $proyectocompartido->fec_ini = $request->fec_ini;
        $proyectocompartido->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        $proyectocompartido = \App\ProyectoCompartido::find($id);
        $proyectocompartido->delete();
        return response()->json(null,204);
    }
}