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
        $proyectoCompartidos = ProyectoCompartido::all(); //variable para guarda o traer todos los registros de proyecto
        return $proyectoCompartidos;
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
        $proyectoCompartidos = new ProyectoCompartido();
        $proyectoCompartidos->nombre = $request->nombre;
        $proyectoCompartidos->describcion = $request->describcion;
        $proyectoCompartidos->estado_actual = 0;
        $proyectoCompartidos->ncolaboradores = 1;
        $proyectoCompartidos->estatus = "Asignación";
        $proyectoCompartidos->fec_ini = $fechahoy->format('Y-m-d');
        $proyectoCompartidos->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyectoCompartidos = ProyectoCompartido::find($id);
        return $proyectoCompartidos;
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
        $proyectoCompartidos = ProyectoCompatido::findOrFail($request->id_proyecto);
        $proyectoCompartidos->id_proyecto = $request->id_proyecto;
        $proyectoCompartidos->nombre = $request->nombre;
        $proyectoCompartidos->describcion = $request->describcion;
        $proyectoCompartidos->estado_actual = $request->estado_actual;
        $proyectoCompartidos->estatus = $request->estatus;
        $proyectoCompartidos->ncolaboradores = $request->ncolaboradores;
        $proyectoCompartidos->fec_ini = $request->fec_ini;
        $proyectoCompartidos->save();
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
        $proyectoCompartidos = \App\ProyectoCompartido::find($id);
        $proyectoCompartidos->delete();
        return response()->json(null,204);
    }
}