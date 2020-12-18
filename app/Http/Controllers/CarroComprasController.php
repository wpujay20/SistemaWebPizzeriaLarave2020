<?php

namespace App\Http\Controllers;

use MercadoPago;
use App\detalle_venta;
use App\Http\Controllers\Controller;
use App\lugar_entrega;
use Illuminate\Http\Request;
use Cart;
use App\pizza;
use App\tipo_pizza;
use App\venta_delivery;
use App\personal_entrega;
use Illuminate\Support\Facades\Auth;
//require '../../../vendor/autoload.php';
class CarroComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function add(Request $request){

            $producto = pizza::find($request->pizza_id);
            $tipo = tipo_pizza::find($producto->tipopizza_id);
            $cant =$request->input('cant');
            Cart::add(
            $producto->pizza_id,
            $producto->pizza_nombre." ".$tipo->tpi_tamano,
            $producto->pizza_precio,
            $cant,
            array("pizza_img"=>$producto->pizza_img)
        );



        return back()->with('success',"$producto->pizza_nombre ¡se ha agregado con éxito al carrito!");

    }

    public function clear(){
        Cart::clear();
        Cart::session(Auth::user()->id)->clear();
        //return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
        return redirect("/CatalogoPizzas");

    }

    public function removeitem(Request $request) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        if(Auth::check()){
            Cart::session(Auth::user()->id)->remove([
                'id'=>$request->pizza_id,
            ]);
        }else{
            Cart::remove([
        'id' => $request->pizza_id,
        ]);
        }

        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

        public function MostrarCarrito(){
            return view('vistas.CarritoPizza');
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

        $venta = new venta_delivery();
        $detalle = new detalle_venta();
        $lugar = new lugar_entrega();

        $dato = $request-> all();



        $dato= $request->all();
        echo "<pre>". var_export($dato). "</pre>";

        //. "</pre>";



        return "Hola mudio";
    }

public function ProcesarPago(Request $request){
    MercadoPago\SDK::setAccessToken('TEST-2941640367030214-081821-27d9f068ff19cbc1a885608db6889a86-627932043');
    $venta = new venta_delivery();
    $personal= new personal_entrega();

    $Carrito= Cart::session(Auth::user()->id)->getContent();

    
   // var_dump($Carrito);
 
    $lugar = new lugar_entrega();
    //$personal = new personal_entrega();
    $dato=$request->all();

    //Inserción a la tabla lugar_entregas
    $lugar->lugar_direccion = $dato['direc'];
    $lugar->lugar_distrito  = $dato['distrito']. " Con referencia: ". $dato['refe'];
    $lugar->save();

    //inserción a la Tabla Venta
    $ultimoId = lugar_entrega::latest('lugarentrega_id')->first();
    $idLugar=  $ultimoId["lugarentrega_id"];

    $idPer=personal_entrega::select('personalentrega_id')
    ->where('estado_id','1')
    ->inRandomOrder()
    ->first();
    $idPentrega= $idPer->toArray();
    //var_dump($idPentrega["personalentrega_id"]);
 

    $venta->lugarentrega_id = $idLugar;
    $venta->usuario_id = Auth::user()->id;
    $venta->personalentrega_id= $idPentrega["personalentrega_id"];
    $venta->vnt_monto_final= Cart::getTotal();
    $venta->vnt_estado = "Cancelado";
    $venta->save();

    $ultimoIdVnt = venta_delivery::latest('ventadelivery_id')->first();
    $idVnt=  $ultimoIdVnt["ventadelivery_id"];
    
    
    foreach ($Carrito as $item){
        
        $detalle = new detalle_venta();
        $detalle->ventadelivery_id = $idVnt;
        $detalle->pizza_id = $item->id;
        $detalle->det_cantidad= $item->quantity;
        $detalle->det_precio_unitario= $item->price;
        $detalle->det_subtotal=$item->quantity*$item->price;
        $detalle->save();
    }

    $personalEdit =personal_entrega::findOrFail($idPentrega["personalentrega_id"]);
    $personalEdit->update(["estado_id"=>"3"]);
  
    Cart::clear();
    Cart::session(Auth::user()->id)->clear();

    return redirect("/index_buena_pizza");

    }

    public function Confirmar(Request $request){
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken('TEST-2941640367030214-081821-27d9f068ff19cbc1a885608db6889a86-627932043');

        $datos=$request->all();


        $payer=new MercadoPago\Payer();
        $payer->address=array(
            "Direccion" => $datos["direc"],
            "Referencia" => $datos["refe"],
            "Distrito" => $datos["distrito"]
        );

        //$direc=$payer->address;
        return view('vistas.pagar_prueba', compact('datos'));
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
