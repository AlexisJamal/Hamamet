<?php

use App\Http\Middleware\CheckStatus;

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

/*Route::get('panier/{id}', [
    'uses' => 'ProduitController@getAddToCart',
    'as' => 'produit.addToCart'
]);

Route::get('/', [
    'uses' => 'ProduitController@getIndex',
    'as' => 'produit.index'
]);
*/

Route::get('pizzas','PizzaController@getPizzas');
Route::get('tacos','ViandeController@getViandes');
Route::get('burgers','BurgerController@getBurgers');
Route::get('panier','CommandeController@getCommandes');
Route::get('panier/{id}','CommandeController@panier');
Route::get('supprimer/{id}','CommandeController@supprimer');
Route::get('listeCommandes', 'CommandeController@getAllCommandes')->middleware('CheckStatus');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
