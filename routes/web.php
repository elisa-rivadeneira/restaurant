<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('redirects', 'App\Http\Controllers\HomeController@index');

Route::group(['prefix'=>'admin'], function(){

Route::resource('users','App\Http\Controllers\UserController');

});

//Route::get('/dash', 'App\Http\Controllers\DashboardController@index')
Route::get('/config', 'App\Http\Controllers\ConfigController@index')->name('admin.config');
Route::post('/config/guardar', 'App\Http\Controllers\ConfigController@store')->name('admin.config.guardar');
Route::get('/config/create', 'App\Http\Controllers\ConfigController@create')->name('admin.config.create');
Route::get('/config/edit/{id}', 'App\Http\Controllers\ConfigController@edit')->name('admin.config.edit');
Route::post('/config/{id}', 'App\Http\Controllers\ConfigController@update')->name('admin.config.update');


Route::post('/config/destroyentrada/{id}', 'App\Http\Controllers\ConfigController@destroyentrada')->name('admin.config.delete');


Route::resource('platos', 'App\Http\Controllers\PlatoController');
Route::resource('menus', 'App\Http\Controllers\MenuController');
Route::resource('entradas', 'App\Http\Controllers\EntradaController');

Route::resource('insumos', 'App\Http\Controllers\InsumoController');
Route::resource('mesas', 'App\Http\Controllers\MesaController');
Route::resource('ordens', 'App\Http\Controllers\OrdenController');
Route::get('/orden/{id}/show', 'App\Http\Controllers\OrdenPlatoController@show')->name('orden.show');
Route::get('/orden/{id}/mirarmenus', 'App\Http\Controllers\OrdenPlatoController@mirarmenus')->name('orden.mirarmenus');
Route::get('/orden/{id}/mirarentradas', 'App\Http\Controllers\OrdenPlatoController@mirarentradas')->name('orden.mirarentradas');
Route::get('/orden/{id}/mostrarcobrarplatos', 'App\Http\Controllers\OrdenController@mostrarcobrarplatos');
Route::get('/orden/{id}/mostrarcobrarmenus', 'App\Http\Controllers\OrdenController@mostrarcobrarmenus');
Route::get('/orden/{id}/montoacobrar', 'App\Http\Controllers\OrdenController@montoacobrar')->name('orden.montoacobrar');

Route::get('/orden/{id}/mirarmenus', 'App\Http\Controllers\OrdenPlatoController@mirarmenus');
Route::get('/orden/{id}/mirarentrada', 'App\Http\Controllers\OrdenPlatoController@mirarentrada');


Route::get('/orden/{id}/status0', 'App\Http\Controllers\OrdenController@status0');
Route::get('/orden/{id}/status1', 'App\Http\Controllers\OrdenController@status1');
Route::get('/orden/{id}/cobrar', 'App\Http\Controllers\OrdenController@cobrar');

Route::get('/ventas', 'App\Http\Controllers\VentaController@ventas');
Route::get('/reporte', 'App\Http\Controllers\VentaController@reporte');
Route::get('/anual', 'App\Http\Controllers\VentaController@anual');
Route::get('/mensual', 'App\Http\Controllers\VentaController@mensual');
Route::get('/semanal', 'App\Http\Controllers\VentaController@semanal');
Route::get('/diario', 'App\Http\Controllers\VentaController@diario');
Route::get('/ventas/{id}', 'App\Http\Controllers\VentaController@dia');
Route::get('/ventasplatos/{id}', 'App\Http\Controllers\VentaController@ventasplatos');
Route::get('/ventasplatosmes/{id}', 'App\Http\Controllers\VentaController@ventasplatosmes');
Route::get('/mensual', 'App\Http\Controllers\VentaController@mensual');
Route::get('/ventasmes/{id}', 'App\Http\Controllers\VentaController@ventasmes');
Route::resource('compras', 'App\Http\Controllers\CompraController');
Route::post("/compra/guardar", "App\Http\Controllers\CompraInsumoController@save");
Route::get('/compra/{id}/mirar', 'App\Http\Controllers\CompraInsumoController@mirar')->name('compra.mirarid');
Route::get('/menu/{id}/mirar', 'App\Http\Controllers\MenuController@mirar')->name('menu.mirarid');
Route::get('/menu/{id}/porciones', 'App\Http\Controllers\MenuController@mirarporciones')->name('menu.mirarporciones');

Route::post('/menu/guardar', 'App\Http\Controllers\MenuController@save')->name('menu.save');



Route::resource('proveedores', 'App\Http\Controllers\ProveedorController');
Route::get('/cocina', 'App\Http\Controllers\CocinaController@index');

Route::get('/cocina/{id}/status0', 'App\Http\Controllers\CocinaController@status0');
Route::get('/cocina/{id}/status1', 'App\Http\Controllers\CocinaController@status1');

Route::get('/cocina/{id}/statuse0', 'App\Http\Controllers\CocinaController@statuse0');
Route::get('/cocina/{id}/statuse1', 'App\Http\Controllers\CocinaController@statuse1');




Route::get('/prueba', 'App\Http\Controllers\VentaController@prueba');
Route::get('/otraprueba', 'App\Http\Controllers\VentaController@otraprueba');



Route::resource('categorias', 'App\Http\Controllers\CategoriaController');


Route::get('/platos/{id}/costos', 'App\Http\Controllers\PlatoController@costo');
Route::post("/plato/guardar", "App\Http\Controllers\PlatoInsumoController@save");
Route::get("/plato/listar", "App\Http\Controllers\PlatoInsumoController@show");
Route::get("/plato/insumos", "App\Http\Controllers\InsumoController@index");
Route::post("/orden/guardar", "App\Http\Controllers\OrdenPlatoController@save");


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/dashboard/crud', function(){
    return view('crud.index');
});

Route::get('/dashboard/crud/create', function(){
    return view('crud.create');
});

Route::get('/getPlato/{id}', 'App\Http\Controllers\OrdenPlatoController@getPlato')->name('getPlato');
Route::get('/getPrecio/{id}', 'App\Http\Controllers\OrdenPlatoController@getPrecio')->name('getPrecio');


