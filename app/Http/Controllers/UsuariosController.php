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
        
    
        $usuario_edit = DB::table('tipo_usuarios')
        ->join('usuarios', 'usuarios.tipousu_id', '=', 'tipo_usuarios.tipousu_id')
        ->join('personas', 'personas.persona_id', '=', 'usuarios.persona_id')
        ->select('usuarios.*', 'personas.*', 'tipo_usuarios.*')
        ->where('personas.persona_id', $id)
        ->get();

        $listatipo_usuario = tipo_usuario::all(); /**LISTA PARA EL FORM */

        //echo '<pre>' . var_export($usuario_edit, true) . '</pre>';
        //$usuario_edit = persona::findOrFail($id);
        
        return view("mant_usuarios.usuarioEdit", compact("usuario_edit"), compact("listatipo_usuario"));
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

       // echo '<pre>' . var_export($request, true) . '</pre>';
    
        DB::table('usuarios')
        ->join('personas', 'personas.persona_id', '=', 'usuarios.persona_id')
        ->where('personas.persona_id', $id)
        ->update([  'per_nombres' =>$request->input("per_nombres"),
                    'per_apellidos' =>$request->input("per_apellidos"),
                    'per_dni' =>$request->input("per_dni"),
                    'per_telefono' =>$request->input("per_telefono"),
                    'usu_correo' =>$request->input("usu_correo"),
                    'usu_pass' =>$request->input("usu_pass"),
                    'tipousu_id' =>$request->input("tipo_usuario"),
                    'usu_estado' =>$request->input("usu_estado")
        ]);

        return redirect("usuarios");

/*
    DB::table('attributes as a')
    ->join('catalog as c', 'a.parent_id', '=', 'c.id')
    ->update([ 'a.key' => DB::raw("`c`.`left_key`") ]); 
*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

//echo $id;
     //echo '<pre>' . var_export($request, true) . '</pre>';

        DB::table('usuarios')
        ->join('personas', 'personas.persona_id', '=', 'usuarios.persona_id')
        ->where('personas.persona_id', $id) ->delete();

        DB::table('personas')->where('personas.persona_id', $id) ->delete();

        return redirect("usuarios");
    }
}
