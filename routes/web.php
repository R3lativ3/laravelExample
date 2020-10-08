<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('home');
});

Route::get('productsCategory/{id}', 'ProductController@ProductoIndex');
Route::get('createProduct', 'ProductController@create');
Route::get('/hola', function(){
    return view('view');
})->name('rutax');

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('josebarrundia21@gmail.com')->send(new \App\Mail\UserWelcome($details));
   
    dd("Email is Sent.");
});

Route::resource('productos','ProductController');
Route::get('account','UserAccountController@index')->name('account');
Route::post('add','ShoppingCart@addToCart')->name('add');
Route::post('guardar','ProductController@store')->name('guardar');
Route::get('addx','ShoppingCart@all')->name('ShoppingCart.all');
Route::post('agregar','ShoppingCart@parametros')->name('agregar');
Route::redirect('/foo', 'admin/name/redirect');
Route::get('carrito', 'ShoppingCart@index');
Route::get('home', 'HomeController@index')->name('home');
Route::get('/query', function(){
    $users = DB::table('users')->get();
    dd($users);
});

Route::get('cotizacion', 'ShoppingCart@emailCotizacion');
//envio de mails creo
Route::get('cotizacionE', 'ShoppingCart@email')->name('cotizacionE');
//prueba de insertar codigo con foreach, servira para compras y cotizaciones.
Route::get('p2', 'ShoppingCart@insert');
//ruta que muestra todas las tiendas en el sistema con una breve descripcion del contenido
Route::get('tiendas', 'StoreController@index');
//ruta que muestra el formulario para crear una nueva tienda
Route::get('crearTienda', 'StoreController@create');
//ruta donde van los datos del formulario para crear nueva tienda
Route::post('agregarTienda', 'StoreController@store');
//para buscar los stocks de determinada tienda con id de parametro
Route::get('agregarTiendaa/{id?}', 'StoreController@stockProductList');
Route::get('agregarStock', 'StoreController@addStockToStore');
//Ruta que aumenta determinado stock en tienda
Route::post('almacenarStock', 'StoreController@storeStock');
//ruta que muestra los proveedores
Route::get('proveedores', 'ProviderController@index');
Route::post('enviarCotizacionEmail', 'ShoppingCart@email2');
Route::get('crearProveedor', 'ProviderController@create');
Route::post('agregarProveedor', 'ProviderController@store');
Route::post('agregarVenta', 'ShoppingCart@storeShop');
Route::get('pdfCompra', 'ShoppingCart@generarPdf');
// ruta que muestra el formulario para crear el usuario administrador
Route::get('crearUsuarioAdministrador', 'UserAdministratorController@create');
// ruta que muestra los administradores
Route::get('verAdministradores', 'UserAdministratorController@index');

Route::post('almacenarAdmin', 'UserAdministratorController@store');

//ruta para pantalla de administrador
Route::get('loginX', 'UserAdministratorController@login');
Route::get('clear', 'ShoppingCart@clearShop');
Route::post('verificarDatos', 'UserAdministratorController@confirmData');
Route::get('usuarios', 'UserAccountController@indexUsers');

Route::get('sucursales', 'StoreController@sucursales');
Auth::routes();

