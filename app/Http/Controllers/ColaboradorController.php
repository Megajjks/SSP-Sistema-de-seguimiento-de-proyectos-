<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Colaboradores; //importamas el modelo al que estara vinculado
use Carbon\Carbon; //para el manejo de fechas actuales

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaboradores = Colaboradores::all(); //variable para guarda o traer todos los registros de proyecto
        return $colaboradores;
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
        $colaboradores1 = Proyecto::create($request->all());
        $colaboradores2 = Users::create($request->all());
        $colaboradores1->proyectos()->attach($colaboradores2->id); 
        //o puedes hacerlo al revés: $modelo2->relacionados()->attach($modelo1->id);
        $fechahoy = Carbon::now(); //obtener las fechas actuales
        $colaboradores = new Colaboradores();
        $colaboradores->nombre = $request->nombre;
        $colaboradores->describcion = $request->describcion;
        $colaboradores->estado_actual = 0;
        $colaboradores->ncolaboradores = 1;
        //$proyecto->estatus = "Asignación";
        $colaboradores->id_proyecto = $request->id_proyecto;
        $colaboradores->id_usuario = $request->id_usuario;
        $colaboradores->name = $request->name;
        $colaboradores->email = $request->email;
        $colaboradores->password =  $request->password;
        $colaboradores->fec_ini = $fechahoy->format('Y-m-d');
        $colaboradores->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colaboradores = Colaboradores::find($id);
        return $colaboradores;
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
        $colaboradores = Colaboradores::findOrFail($request->id_colaborador);
        $colaboradores->id_proyecto = $request->id_proyecto;
        $colaboradores->id_usuario = $request->id_usuario;
        $colaboradores->nombre = $request->nombre;
        $colaboradores->describcion = $request->describcion;
        $colaboradores->estado_actual = $request->estado_actual;
        $colaboradores->estatus = $request->estatus;
        $colaboradores->ncolaboradores = $request->ncolaboradores;
        $colaboradores->fec_ini = $request->fec_ini;
        $colaboradores->name = $request->name;
        $colaboradores->email = $request->email;
        $colaboradores->password =  $request->password;
        $colaboradores->save();
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
        $colaboradors = \App\Colaboradores::find($id);
        $colaboradors->delete();
        return response()->json(null,204);
    }
}