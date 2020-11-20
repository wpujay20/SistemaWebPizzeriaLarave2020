<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePersonalRequest;

use App\personal_entrega;
use App\estado_personal;

class PersonalEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listapersonalEntrega = DB::table('personal_entregas')
        ->join('estado_personals', 'personal_entregas.estado_id', '=', 'estado_personals.estadopersonal_id')
        ->select('estado_personals.*', 'personal_entregas.*')
        ->get();

        $listaEstados = estado_personal::all();

        return view("mant_personal.MantPersonalEntregaIndex", compact("listapersonalEntrega"),  compact("listaEstados"));

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
    public function store(CreatePersonalRequest $request)
    {

        $personal = new personal_entrega();
        $personal->peen_nombres = $request->nombres;
        $personal->peen_apellidos = $request->apellidos;
        $personal->peen_telefono = $request->telefono;
        $personal->estado_id = $request->estado;;
        $personal->save();

        return redirect("personal");
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
        //personalentrega_id
                
    
        $personalentrega_edit = DB::table('personal_entregas')
        ->join('estado_personals', 'personal_entregas.estado_id', '=', 'estado_personals.estadopersonal_id')
        ->select('estado_personals.*', 'personal_entregas.*')
        ->where('personal_entregas.personalentrega_id', $id)
        ->get();

        $listaEstados = estado_personal::all(); /**LISTA PARA EL FORM */

        //echo '<pre>' . var_export($personalentrega_edit, true) . '</pre>';
        //$usuario_edit = persona::findOrFail($id);
        
        return view("mant_personal.PersonalEntregaEdit", compact("personalentrega_edit"), compact("listaEstados"));
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
        //echo '<pre>' . var_export($request, true) . '</pre>';


        DB::table('personal_entregas')
        ->where('personal_entregas.personalentrega_id', $id)
        ->update([  'peen_nombres' =>$request->input("peen_nombres"),
                    'peen_apellidos' =>$request->input("peen_apellidos"),
                    'peen_telefono' =>$request->input("peen_telefono"),
                    'estado_id' =>$request->input("estadopersonal_id")
        ]);

        return redirect("personal");


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
