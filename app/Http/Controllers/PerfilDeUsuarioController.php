<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditPerfilUsuario;
use App\Http\Requests\CreatePerfilUsuarioRequest;
use Illuminate\Support\Facades\Auth;
use App\usuario;
use App\persona;
use App\venta_delivery;
use App\detalle_venta;

class PerfilDeUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("vistas.PerfilUsuario.crearUsuario");
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
    public function store(CreatePerfilUsuarioRequest $request)
    {

        $persona = new persona();
        $persona->per_nombres = $request->per_nombres;
        $persona->per_apellidos = $request->per_apellidos;
        $persona->per_dni = $request->per_dni;
        $persona->per_telefono = $request->per_telefono;
        $persona->save();

        $ultimoId = persona::latest('persona_id')->first();
        $Id=  $ultimoId["persona_id"];

        $usuario = new usuario();
        $usuario->tipousu_id = 2;
        $usuario->usu_correo = $request->usu_correo;
        $usuario->usu_pass = $request->usu_pass;
        $usuario->usu_estado = "habilitado";
        $usuario->persona_id = $Id;
        $usuario->save();

        return redirect("index_buena_pizza");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Perfil = DB::table('tipo_usuarios')
        ->join('usuarios', 'usuarios.tipousu_id', '=', 'tipo_usuarios.tipousu_id')
        ->join('personas', 'personas.persona_id', '=', 'usuarios.persona_id')
        ->select('usuarios.*', 'personas.*', 'tipo_usuarios.*')
        ->where('personas.persona_id', $id)
        ->get();

        return view("vistas.PerfilUsuario.perfil", compact("Perfil"));
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
    public function update(EditPerfilUsuario $request, $id)
    {

                DB::table('usuarios')
                ->join('personas','personas.persona_id', '=', 'usuarios.persona_id')
                ->where('personas.persona_id', $id)
                ->update([  'per_nombres' =>$request->input("per_nombres"),
                            'per_apellidos' =>$request->input("per_apellidos"),
                            'per_dni' =>$request->input("per_dni"),
                            'per_telefono' =>$request->input("per_telefono"),
                            'usu_correo' =>$request->input("email"),
                            'usu_pass' =>$request->input("password")]);
                return redirect("PerfilDeUsuario/$id");
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

    
    public function Historial()
    {

        $id=Auth::user()->id;
        $pedido = DB::table('venta_deliveries')
        ->join('lugar_entregas','lugar_entregas.lugarentrega_id','=','venta_deliveries.lugarentrega_id')
        ->select('venta_deliveries.*','lugar_entregas.*')
        ->where('venta_deliveries.usuario_id', $id)
        ->get();
        return view('vistas.HistorialPedidos',compact("pedido"));
        
    }


}
