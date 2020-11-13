<?php

use Illuminate\Support\Facades\Route;
use App\tipo_usuario;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('vista_login');
});

/*
Route::get('/insertar', function () {

    $tipoUsuario = new tipo_usuario();
    $tipoUsuario->tipo_nombre = "Administrador";
    $tipoUsuario->tipo_descripcion = "Es el que se encarga de gestionar la informacion del sistema";
    $tipoUsuario->save();
    
});
*/


Route::resource('/personal', PersonalEntregaController::class);
Route::resource('/mantenimientos', MantenimientoController::class);
Route::resource('/usuarios', UsuariosController::class);
Route::resource('/pizzas', PizzasController::class);
Route::resource('/tipo_pizzas', tipo_pizzasController::class);
Route::resource('/ventas_delivery', VentasController::class);




