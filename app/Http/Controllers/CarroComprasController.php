<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\pizza;
use Illuminate\Support\Facades\Auth;
class CarroComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function add(Request $request){
        
            $producto = pizza::find($request->pizza_id);
            $cant =$request->input('cant');
            Cart::add(
            $producto->pizza_id, 
            $producto->pizza_nombre,
            $producto->pizza_precio,
            $cant,
            array("pizza_img"=>$producto->pizza_img)
        );
    
        
        
        return back()->with('success',"$producto->pizza_nombre ¡se ha agregado con éxito al carrito!");
            
    }

    public function clear(){
        Cart::clear();
        Cart::session(Auth::user()->id)->clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
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
