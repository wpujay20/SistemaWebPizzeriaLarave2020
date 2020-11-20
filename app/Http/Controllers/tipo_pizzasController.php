<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTipoPizzasRequest;

use App\tipo_pizza;



class tipo_pizzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $listaTiposPizzas = tipo_pizza::all();

        return view("mant_tipo_pizzas.MantTipoPizzasIndex", compact("listaTiposPizzas"));

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
    public function store(CreateTipoPizzasRequest $request)
    {
        $entrada = $request->all();
        tipo_pizza::create($entrada);

        return redirect("tipo_pizzas");
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


        $TipoPizzaEdit = tipo_pizza::findOrFail($id);
    
        return view("mant_tipo_pizzas.TipoPizzasEdit", compact("TipoPizzaEdit"));
    
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
        $tipoEditar = tipo_pizza::findOrFail($id);
        $tipoEditar->update($request->all());

        return redirect("tipo_pizzas");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoEditar = tipo_pizza::findOrFail($id);
        $tipoEditar->delete();
        return redirect("tipo_pizzas");

    }
}
