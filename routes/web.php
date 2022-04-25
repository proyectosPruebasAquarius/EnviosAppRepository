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
    return view('inicio');
});


Route::get('/inicio-sesion', function () {
    return view('login.login');
})->middleware('islogin');

Route::get('/registro', function () {
    return view('login.register');
})->middleware('islogin');
Route::get('/registro-repartidor', function () {
    return view('login.register-driver');
})->middleware('islogin');

Route::get('/pedidos','PedidoController@index')->middleware(['isnotlogin','emailisverify']);
Route::get('/pedidos/rechazados','PedidoController@rechazados')->middleware(['isnotlogin','emailisverify']);
Route::get('/pedidos/pendientes','PedidoController@pendientes')->middleware(['isnotlogin','emailisverify']);
Route::get('/pedidos/completados','PedidoController@completados')->middleware(['isnotlogin','emailisverify']);



Route::get('/verificacion',function(){
    return view('correo.verificacion');
})->middleware(['isnotlogin','emailisnotverify']);

Route::get('/codigo-verificacion',function(){
    return view('correo.generador');
})->middleware(['isnotlogin','emailisnotverify']);


Route::get('/test',function(){
    return view('email.cod-verification');
});

Route::get('logout',[App\Http\Controllers\cerrarSesionController::class, 'logout']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
