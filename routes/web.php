<?php

use App\Http\Controllers\PersonalEntregaController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\tipo_pizzasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VentasController;


use Illuminate\Support\Facades\Route;
use App\tipo_usuario;
use App\usuario;

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    $usu = new usuario();
    return $usu->validarRuta();
});

Route::get('/index_buena_pizza', function () {
     $usu = new usuario();
    return $usu->validarRuta();
})->name('index_buena_pizza');


Route::get('/promociones', function () {
    return view('vistas.Promociones');
});

Auth::routes();
Route::post('/cart-add', 'CarroComprasController@add')->name('cart.add');
Route::get('/cart-clear', 'CarroComprasController@clear')->name('cart.clear');
Route::post('/cart-removeitem',  'CarroComprasController@removeitem')->name('cart.removeitem');



Route::group(['middleware' => ['auth']], function() {
    /*
    Rutas de administración de personal
    */
// Route::get('personal',                              ['middleware' => [], 'as' => 'personal.index',      'uses' => 'PersonalEntregaController@index' ]);

Route::get('personal',function(){
    $C= new PersonalEntregaController();

    $usu = new usuario();
    if(Auth::user()->tipousu_id==3){
        return $C->index();
    }else{
        return $usu->validarRuta();
    }
})->name('personal.index');
Route::post('personal/create',                      ['middleware' => [], 'as' => 'personal.create',      'uses' => 'PersonalEntregaController@create' ]);
//Route::post('personal/create',                      ['middleware' => [], 'as' => 'personal.store',      'uses' => 'PersonalEntregaController@store' ]);
Route::get('personal/edit/{personalEntrega}',       ['middleware' => [], 'as' => 'personal.edit',       'uses' => 'PersonalEntregaController@edit' ]);
Route::put('personal/actualizar/{personalEntrega}', ['middleware' => [], 'as' => 'personal.update',     'uses' => 'PersonalEntregaController@update' ]);
Route::delete('upersonalers/{personalEntrega}',     ['middleware' => [], 'as' => 'personal.destroy',     'uses' => 'PersonalEntregaController@destroy' ] );

Route::get('mantenimientos',function(){
    $M= new MantenimientoController();

    $usu = new usuario();
    if(Auth::user()->tipousu_id==3){
        return $M->index();
    }else{
        return $usu->validarRuta();
    }
})->name('mantenimientos.index');

Route::get('pizzas',function(){
    $p= new PizzasController();

    $usu = new usuario();
    if(Auth::user()->tipousu_id==3){
        return $p->index();
    }else{
        return $usu->validarRuta();
    }
})->name('pizzas.index');
Route::post('pizzas/create',                ['middleware' => [], 'as' => 'pizzas.store',      'uses' => 'PizzasController@store' ]);
Route::get('pizzas/edit/{pizzas}',          ['middleware' => [], 'as' => 'pizzas.edit',       'uses' => 'PizzasController@edit' ]);
Route::put('pizzas/actualizar/{pizzas}',    ['middleware' => [], 'as' => 'pizzas.update',     'uses' => 'PizzasController@update' ]);
Route::delete('pizzas/{pizzas}',            ['middleware' => [], 'as' => 'pizzas.destroy',     'uses' => 'PizzasController@destroy' ] );


//Route::resource('/mantenimientos', MantenimientoController::class);
//Route::resource('/pizzas', PizzasController::class);
Route::get('tipo_pizzas',function(){

    $tipo= new tipo_pizzasController();
    $usu = new usuario();
    if(Auth::user()->tipousu_id==3){
        return $tipo->index();
    }else{
        return $usu->validarRuta();
    }
})->name('tipo_pizzas.index');
//Route::resource('/tipo_pizzas', tipo_pizzasController::class);
Route::post('tipo_pizzas/create',                ['middleware' => [], 'as' => 'tipo_pizzas.store',      'uses' => 'tipo_pizzasController@store' ]);
Route::get('tipo_pizzas/edit/{pizzas}',          ['middleware' => [], 'as' => 'tipo_pizzas.edit',       'uses' => 'tipo_pizzasController@edit' ]);
Route::put('tipo_pizzas/actualizar/{pizzas}',    ['middleware' => [], 'as' => 'tipo_pizzas.update',     'uses' => 'tipo_pizzasController@update' ]);
Route::delete('tipo_pizzas/{pizzas}',            ['middleware' => [], 'as' => 'tipo_pizzas.destroy',     'uses' => 'tipo_pizzasController@destroy' ] );

Route::get('usuarios',function(){

    $tipo= new UsuariosController();
    $usu = new usuario();
    if(Auth::user()->tipousu_id==3){
        return $tipo->index();
    }else{
        return $usu->validarRuta();
    }
})->name('usuarios.index');
//Route::resource('/usuarios', UsuariosController::class);
Route::post('usuarios/create',                ['middleware' => [], 'as' => 'usuarios.store',      'uses' => 'UsuariosController@store' ]);
Route::get('usuarios/edit/{pizzas}',          ['middleware' => [], 'as' => 'usuarios.edit',       'uses' => 'UsuariosController@edit' ]);
Route::put('usuarios/actualizar/{pizzas}',    ['middleware' => [], 'as' => 'usuarios.update',     'uses' => 'UsuariosController@update' ]);
Route::delete('usuarios/{pizzas}',            ['middleware' => [], 'as' => 'usuarios.destroy',     'uses' => 'UsuariosController@destroy' ] );

Route::get('ventas_delivery',function(){

    $tipo= new VentasController();
    $usu = new usuario();
    if(Auth::user()->tipousu_id==3){
        return $tipo->index();
    }else{
        return $usu->validarRuta();
    }
})->name('ventas_delivery.index');
//Route::resource('/ventas_delivery', VentasController::class);
Route::post('ventas_delivery/create',              ['middleware' => [], 'as' => 'ventas_delivery.store',      'uses' => 'VentasController@store' ]);
Route::get('ventas_delivery/edit/{dato}',          ['middleware' => [], 'as' => 'ventas_delivery.edit',       'uses' => 'VentasController@edit' ]);
Route::get('ventas_delivery/{dato}',               ['middleware' => [], 'as' => 'ventas_delivery.show',       'uses' => 'VentasController@show' ]);
Route::put('ventas_delivery/actualizar/{dato}',    ['middleware' => [], 'as' => 'ventas_delivery.update',     'uses' => 'VentasController@update' ]);
Route::delete('ventas_delivery/{dato}',            ['middleware' => [], 'as' => 'ventas_delivery.destroy',     'uses' => 'VentasController@destroy' ] );

});

Route::resource('/CatalogoPizzas', CatalogoPizzasController::class);
Route::resource('/CarroCompras', CarroComprasController::class);
Route::resource('/PerfilDeUsuario', PerfilDeUsuarioController::class);
Route::get('/home', 'HomeController@index')->name('home');
