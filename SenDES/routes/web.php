<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/abonnement', function() {
    return view('abonnement');
 });
 Route::get('/editionabonnement', function() {
   return view('editionabonnement');
});
 Route::get('/compteur', function() {
    return view('compteur');
 });

 Route::get('/editioncompteur', function() {
   return view('editioncompteur');
});

 Route::get('/facture', function() {
    return view('facture');
 });

 Route::get('/factureformat', function() {
    return view('factureformat');
 });

 Route::get('/factureedition', function() {
   return view('factureedition');
});

 Route::get('', function() {
   return view('login');
});

Route::get('/login', 'MainController@index');
Route::post('/checklogin', 'MainController@checklogin');
Route::get('/successlogin', 'MainController@successlogin');
Route::get('/logout', 'MainController@logout');
Route::get('/compteur', 'CompteurController@create');
 Route::post('/store', 'CompteurController@store');
 Route::get('/compteur', 'CompteurController@liste');
 Route::get('/compteur', 'CompteurController@index');
 Route::get('/edite/{id}', 'CompteurController@edite');
 Route::post('/updated/{id}', 'CompteurController@updated');

 Route::get('/abonnement', 'AbonnementController@create');
 Route::post('/store', 'AbonnementController@store');
 Route::get('/abonnement', 'AbonnementController@index');
 Route::get('/destroy/{id}', 'AbonnementController@destroy');
 Route::get('/edit/{id}', 'AbonnementController@edit');
 Route::post('/update/{id}', 'AbonnementController@update');

Route::get('/facture', 'FactureController@create');
Route::get('/facture', 'FactureController@index');
Route::get('/generer/{id}', 'FactureController@generer');
Route::get('/editedd/{id}', 'FactureController@editedd');
Route::post('/updatedd/{id}', 'FactureController@updatedd');
//Route::post('/facture', 'FactureController@updatedd');
Route::get('/editionfacture', 'FactureController@liste');
Route::get('/destroye/{id}', 'FactureController@destroye');
Route::get('/store', 'FactureController@store');
Route::get('/apifacture', 'FactureController@showapi');

