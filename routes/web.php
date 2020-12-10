<?php


use Illuminate\Support\Facades\Route;
use App\tipo_usuario;
use App\usuario;

use Illuminate\Support\Facades\Auth;

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
     $lista = date('Y-m-d');
    return view('vistas.index', compact("lista"));
});

// Route::get('/login', function () {
//    return view('vistas.login');
// });

//Route::POST('/validarLogin','UsuariosController@validarUsuario')->name("usuarios.validar");


Route::get('/index_buena_pizza', function () {
    $lista = date('Y-m-d');
    return view('vistas.index', compact("lista"));
});


Route::get('/promociones', function () {
    return view('vistas.Promociones');
});

// Route::post('/CatalogoPizzasDetalle/{id}', function(){
//     return view('vistas.CatalogoPizzasDetalle');
// });

// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Auth::routes();

// Route::group(['middleware' => ['auth']], function() {
//     /*
//     Rutas de administración de personal
//     */
//     Route::get('personal',                              ['middleware' => [], 'as' => 'personal.index',      'uses' => 'PersonalEntregaController@index' ]);
//     Route::post('personal/create',                      ['middleware' => [], 'as' => 'personal.store',      'uses' => 'PersonalEntregaController@store' ]);
//     Route::get('personal/edit/{personalEntrega}',       ['middleware' => [], 'as' => 'personal.edit',       'uses' => 'PersonalEntregaController@edit' ]);
//     Route::put('personal/actualizar/{personalEntrega}', ['middleware' => [], 'as' => 'personal.update',     'uses' => 'PersonalEntregaController@update' ]);
// });


/*
Route::get('/insertar', function () {
    $tipoUsuario = new tipo_usuario();
    $tipoUsuario->tipo_nombre = "Administrador";
    $tipoUsuario->tipo_descripcion = "Es el que se encarga de gestionar la informacion del sistema";
    $tipoUsuario->save();

});
*/
Route::resource('/mantenimientos', MantenimientoController::class);
Route::resource('/usuarios', UsuariosController::class);
Route::resource('/pizzas', PizzasController::class);
Route::resource('/tipo_pizzas', tipo_pizzasController::class);
Route::resource('/ventas_delivery', VentasController::class);
Route::resource('/CatalogoPizzas', CatalogoPizzasController::class);
Route::resource('/CarroCompras', CarroComprasController::class);
Route::resource('/PerfilDeUsuario', PerfilDeUsuarioController::class);
Route::resource('/personal', PersonalEntregaController::class);




// Route::resource('/CatalogoPizzas', CatalogoPizzasController::class);






// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
