<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\usuario;
use App\tipo_usuario;
use App\persona;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$listaUsuarios = usuario::all();    */
        
        $listatipo_usuario = tipo_usuario::all(); /**LISTA PARA EL FORM */

        $listaUsuarios = DB::table('tipo_usuarios')
        ->join('usuarios', 'usuarios.tipousu_id', '=', 'tipo_usuarios.tipousu_id')
        ->join('personas', 'personas.persona_id', '=', 'usuarios.persona_id')
        ->select('usuarios.*', 'personas.*', 'tipo_usuarios.*')
        ->get();

        return view("mant_usuarios.MantUsuariosIndex", compact("listaUsuarios"), compact("listatipo_usuario"));

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
        $persona = new persona();
        $persona->per_nombres = $request->nombre;
        $persona->per_apellidos = $request->apellido;
        $persona->per_dni = $request->dni;
        $persona->per_telefono = $request->telefono;
        $persona->save();

        $ultimoId = persona::latest('persona_id')->first();
        $Id=  $ultimoId["persona_id"];

        $usuario = new usuario();
        $usuario->tipousu_id = $request->tipo_usuario;
        $usuario->usu_correo = $request->correo;
        $usuario->usu_pass = $request->contra;
        $usuario->usu_estado = "habilitado";
        $usuario->persona_id = $Id;
        $usuario->save();

        return redirect("usuarios");

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
    public function update(Request $request, $id)
    {
        //
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
