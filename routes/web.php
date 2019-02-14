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
    Route::get('/passport', function () {  return view('passport.index');  })->name('passport');

    Route::group(['prefix' => '/docu', 'as' => 'docu.'], function () {
        Route::get('/access', function () {  return view('docu.access');  })->name('access');
        Route::get('/fetchingdata', function () {  return view('docu.fetchingdata');  })->name('fetchingdata');

        //Core:
        Route::get('/jobpostings', function () {  return view('docu.jobpostings');  })->name('jobpostings');

        //Utilities:
        Route::get('/cities', function () {  return view('docu.cities');  })->name('cities');
        Route::get('/states', function () {  return view('docu.states');  })->name('states');
        Route::get('/streets', function () {  return view('docu.streets');  })->name('streets');
        Route::get('/countries', function () {  return view('docu.countries');  })->name('countries');
        Route::get('/locations', function () {  return view('docu.location');  })->name('locations');
        Route::get('/languages', function () {  return view('docu.languages');  })->name('languages');


    });

    Route::group(['prefix' => '/hrdb', 'as' => 'hrdb.'], function () {
        Route::get('/jobpostings', function () {  return view('hrdb.jobpostings');  })->name('jobpostings');
    });
});