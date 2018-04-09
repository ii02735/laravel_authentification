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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/verifier/{token}', 'VerificationController@verifier')->name('verifier');
Route::get('/verifierChg/{token}', 'VerificationController@verifier2')->name('verifierChg');
Route::middleware(["chg-confirmed","is-confirmed"])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/chgName','HomeController@chgName')->name('chgName');
    Route::post('/chgFirstname','HomeController@chgFirstname')->name('chgFirstname');
    Route::post('/chgAddr','HomeController@chgAddr')->name('chgAddr');
    Route::post('/chgNumTel','HomeController@chgNumTel')->name('chgNumTel');
    Route::post('/chgEmail','HomeController@chgEmail')->name('chgEmail');
    Route::post('/chgPassword','HomeController@chgPassword')->name('chgPassword');
});


Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

