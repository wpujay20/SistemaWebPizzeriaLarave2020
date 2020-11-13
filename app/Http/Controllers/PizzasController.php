<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePizzasRequest;

use App\pizza;
use App\tipo_pizza;



class PizzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPizzas = DB::table('pizzas')
        ->join('tipo_pizzas', 'pizzas.tipopizza_id', '=', 'tipo_pizzas.tipopizza_id')
        ->select('tipo_pizzas.*', 'pizzas.*')
        ->get();

        $listaTiposPizzas = tipo_pizza::all();

        return view("mant_pizzas.MantPizzasIndex", compact("listaPizzas"),  compact("listaTiposPizzas"));

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
    public function store(CreatePizzasRequest $request)
    {

            /*Obtenemos los datos del formulario */
            $entrada = $request->all();
            $array = array();

             /*obtenemos los datos de la imagen (archivo) */
            
                if($archivo = $request->file('pizza_img')){
                    
                    $tipoArchivo =  $archivo->getClientMimeType();

                    if($tipoArchivo == 'image/png' || $tipoArchivo == 'image/jpeg' || $tipoArchivo == 'image/jpg'){

                        /*NOMBRE DE LA IMAGEN QUE LLEGO*/
                        $nombre = $archivo->getClientOriginalName(); 
                    
                        /*Movimiento de la imagen a la carpeta public/images/  */
                        $archivo->move('images', $nombre);
                    
                        /*Almacenamos la ruta para enviarla */
                        $entrada['pizza_img'] = $nombre;
                        echo $nombre;
                    }
                    else{
                        return redirect("pizzas");
                    }
                } else{
                    $entrada['pizza_img'] = "Sin Imagen";
                }

                   /*Enviamos los datos a la BBDD */
                    pizza::create($entrada);
        
            return redirect("pizzas");
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
        $PizzaEdit = DB::table('pizzas')
        ->join('tipo_pizzas', 'pizzas.tipopizza_id', '=', 'tipo_pizzas.tipopizza_id')
        ->select('tipo_pizzas.*', 'pizzas.*')
        ->where('pizzas.pizza_id', $id)
        ->get();

        $listaTiposPizzas = tipo_pizza::all();

        /*echo '<pre>' . print_r($PizzaEdit, true) . '</pre>';
        echo '<pre>' . print_r($listaTiposPizzas, true) . '</pre>';*/

        return view("mant_pizzas.PizzasEdit", compact("PizzaEdit"), compact("listaTiposPizzas"));
    
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
        $entrada = $request->all();
        
                if($archivo = $request->file('pizza_img')){
                    
                    $tipoArchivo =  $archivo->getClientMimeType();
                    if($tipoArchivo == 'image/png' || $tipoArchivo == 'image/jpeg' || $tipoArchivo == 'image/jpg'){
        
                        $nombre = $archivo->getClientOriginalName(); 
                        $archivo->move('images', $nombre);
                        $entrada['pizza_img'] = $nombre;
                    }
                    else{
                        return redirect("pizzas");
                    }
                } 

                if($archivo==null || $archivo = "" ){
                    $entrada['pizza_img'] = "Sin Imagen";
                }

                DB::table('pizzas')
                ->join('tipo_pizzas', 'pizzas.tipopizza_id', '=', 'tipo_pizzas.tipopizza_id')
                ->select('tipo_pizzas.*', 'pizzas.*')
                ->where('pizzas.pizza_id', $id)
                ->update([  'pizza_nombre' =>$request->input("pizza_nombre"),
                            'pizza_precio' =>$request->input("pizza_precio"),
                            'pizza_descripcion' =>$request->input("pizza_descripcion"),
                            'pizzas.tipopizza_id' =>$request->input("tipopizza_id"),
                            'pizza_img' =>$entrada['pizza_img']
                ]);
                return redirect("pizzas");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $pizza = pizza::findOrFail($id);
        $pizza->delete();
        return redirect("pizzas");

    }
}
