<?php

use Illuminate\Http\Request;
//use App\Http\Controller\ContactsController; nema potrebe jer smo dole pisali ::class

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//ovo je za globalno da nam prihvati request i da nemamo cors gresku a sa corsom mozemo omoguciti tacno koji endpointu ce biti dostupni

// header('Access-Control-Allow-Origin: *');  //zvezdica dopusta svim aplikacija da pristupi
// header('Access-Control-Allow-Methods: PUT,GET,POST,DELETE,OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type,Accept,Origin');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('contacts', 'ContactsController@index');

Route::resource('contacts', ContactsController::class)
    ->except(['create', 'edit']);
    //da ne bi vracalo gresku 500 onda stavimo da ne ide na te rute
