<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\venta_delivery;
use App\detalle_venta;
use App\lugar_entrega;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditVentasRequest;


class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listaVentas = DB::table('venta_deliveries')
        ->join('lugar_entregas', 'lugar_entregas.lugarentrega_id', '=', 'venta_deliveries.lugarentrega_id')
        ->join('usuarios', 'usuarios.id', '=', 'venta_deliveries.usuario_id')
        ->join('personas', 'personas.persona_id', '=', 'usuarios.persona_id')
        ->join('personal_entregas', 'personal_entregas.personalentrega_id', '=', 'venta_deliveries.personalentrega_id')
        ->select('venta_deliveries.*', 'lugar_entregas.*',  'usuarios.*',  'personas.*', 'personal_entregas.*')
        ->get();

        return view("mant_ventas.MantVentasIndex", compact("listaVentas"));

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
        $venta= new venta_delivery();
        $detalle= new detalle_venta();
        $lugar = new lugar_entrega();
        //extract($_REQUEST);
        echo "<pre>". var_export($_REQUEST) . "</pre>";
        return "FALTA RELLENAR LUGAR-DETALLE-VENTA";


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $DetalleVentas = DB::table('detalle_ventas')
        ->join('venta_deliveries', 'detalle_ventas.ventadelivery_id', '=', 'venta_deliveries.ventadelivery_id')
        ->join('pizzas', 'pizzas.pizza_id', '=', 'detalle_ventas.pizza_id')
        ->join('lugar_entregas', 'lugar_entregas.lugarentrega_id', '=', 'venta_deliveries.lugarentrega_id')
        ->join('tipo_pizzas', 'tipo_pizzas.tipopizza_id', '=', 'pizzas.tipopizza_id')
        ->join('usuarios', 'usuarios.id', '=', 'venta_deliveries.usuario_id')
        ->join('personas', 'personas.persona_id', '=', 'usuarios.persona_id')
        ->join('personal_entregas', 'personal_entregas.personalentrega_id', '=', 'venta_deliveries.personalentrega_id')
        ->select('detalle_ventas.*', 'venta_deliveries.*', 'pizzas.*', 'lugar_entregas.*', 'tipo_pizzas.*', 'usuarios.*',  'personas.*', 'personal_entregas.*')
        ->where('venta_deliveries.ventadelivery_id', $id)
        ->get();

        return view("mant_ventas.MantVentasShow", compact("DetalleVentas"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaVentasEdit = DB::table('venta_deliveries')
        ->join('lugar_entregas', 'lugar_entregas.lugarentrega_id', '=', 'venta_deliveries.lugarentrega_id')
        ->join('usuarios', 'usuarios.id', '=', 'venta_deliveries.usuario_id')
        ->join('personas', 'personas.persona_id', '=', 'usuarios.persona_id')
        ->join('personal_entregas', 'personal_entregas.personalentrega_id', '=', 'venta_deliveries.personalentrega_id')
        ->select('venta_deliveries.*', 'lugar_entregas.*',  'usuarios.*',  'personas.*', 'personal_entregas.*')
        ->where('venta_deliveries.ventadelivery_id', $id)
        ->get();

        return view("mant_ventas.MantVentasEdit", compact("listaVentasEdit"));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditVentasRequest $request, $id)
    {
        //echo '<pre>' . var_export($request, true) . '</pre>';
        $venta_delivery = venta_delivery::findOrFail($id);
        $venta_delivery->update($request->all());
        return redirect("ventas_delivery");
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
