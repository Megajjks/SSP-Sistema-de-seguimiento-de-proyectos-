<?php
namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Registro(Request $request){

        $validacion = Validator :: make($request->all(),

        [
            'nombre' => 'required|max:50',
             'APaterno' => 'required|max:50',
             'AMaterno' => 'required|max:50',
             'email' => 'email|unique:Usuario',
             'password' => 'required|min:6'
         ]);
     if ($validacion->fails())
     {
        return redirect('/#register')
            ->withInput()
            ->withErrors($validacion);
    }
    $user = new Usuario();
        $user->nombre = $request->nombre;
        $user->APaterno = $request->APaterno;
        $user->AMaterno = $request->AMaterno;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return view('login/registro');

    }
    public function Login(){
        $credenciales = $this->validate(request(),
        [
            'email' => 'email',
            'password' => 'min:6'

        ]);
        if (Auth::attempt($credenciales))
        {
            return view('template/contenido');
        }
    }
     
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
