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
    return view('public.welcome');
});

Route::get('/imprint', function () {
    return view('public.imprint');
})->name('imprint');

Route::get('/datasecurity-terms_and_conditions', function () {
    return view('public.datasecurity-terms_and_conditions');
})->name('datasecurity-terms_and_conditions');

Route::resource('contact', 'ContactController');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});