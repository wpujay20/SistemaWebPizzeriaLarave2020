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
        $listapersonalEntrega = personal_entrega::with('estado')->get();
        $listaEstados = estado_personal::all();

        return view("mant_personal.MantPersonalEntregaIndex", compact("listapersonalEntrega", "listaEstados"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        personal_entrega::create($request->all());
        return redirect("personal");
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePersonalRequest $request)
    {
        personal_entrega::create($request->all());

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
    public function edit(personal_entrega $personalEntrega)
    {
        $listaEstados = estado_personal::all(); /**LISTA PARA EL FORM */
            return view("mant_personal.PersonalEntregaEdit", compact("personalEntrega", "listaEstados"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, personal_entrega $personalEntrega)
    {
        $personalEntrega->update($request->all());
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
        $pizza = personal_entrega::findOrFail($id);
        $pizza->delete();
        return redirect("personal");
    }
}
