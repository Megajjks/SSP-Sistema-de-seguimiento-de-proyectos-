<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userRol = $request->user()->rol;
        if($userRol == 1){
            return redirect('/lider-p');
        }else{
            return redirect('/colaborador');
        }
        //$isLider = $request->user()->authorizeRoles('lider');
        //$isColaborador = $request->user()->authorizeRoles('colaborador');
        //if($isLider){
        //    return redirect('/lider-p');
        //}
        
        //if($isColaborador){
        //    return redirect('/colaborador');
        //}
        
        //return view('home');
    }
    
    //public function someAdminStuff(Request $request)
    //{
    //    $request->user()->authorizeRoles('lider');
    //    return redirect('/lider-p');
    //    //return view('home');
    //}
}
