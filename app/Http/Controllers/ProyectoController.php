<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto; //importamas el modelo al que estara vinculado
use Carbon\Carbon; //para el manejo de fechas actuales

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all(); //variable para guarda o traer todos los registros de proyecto
        return $proyectos;
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
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->nombre;
        $proyecto->describcion = $request->describcion;
        $proyecto->estado_actual = 0;
        $proyecto->ncolaboradores = 1;
        //$proyecto->estatus = "Asignación";
        $proyecto->fec_ini = $fechahoy->format('Y-m-d');
        $proyecto->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$proyecto = Proyecto::find($id);
        //return response()->json($proyecto);
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
        $proyecto = Proyecto::findOrFail($request->id_proyecto);
        $proyecto->nombre = $request->nombre;
        $proyecto->describcion = $request->describcion;
        $proyecto->estado_actual = $request->estado_actual;
        $proyecto->ncolaboradores = $request->ncolaboradores;
        $proyecto->fec_ini = $request->fec_ini;
        $proyecto->save();
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
}
