<?php

use Illuminate\Http\Request;

use App\Models\City;
use App\Http\Resources\CityResource;

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

Route::group(['middleware' => ['auth:api'], 'prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::get('/', 'HomeController@index');

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user');

    Route::resource('users', 'UserController')->only([
        'index', 'show'
    ]);
    Route::resource('cities', 'CityController')->only([
        'index', 'show', 'store', 'update'
    ]);
    Route::resource('languages', 'LanguageController')->only([
        'index', 'show', 'store', 'update'
    ]);
    Route::resource('currencies', 'CurrencyController')->only([
        'index', 'show', 'store', 'update'
    ]);
    Route::resource('countries', 'CountryController')->only([
        'index', 'show', 'store', 'update'
    ]);
    Route::resource('states', 'StateController')->only([
        'index', 'show', 'store', 'update'
    ]);
    Route::resource('postalcodes', 'PostalcodeController')->only([
        'index', 'show', 'store', 'update'
    ]);
    Route::resource('streets', 'StreetController')->only([
        'index', 'show', 'store', 'update'
    ]);
    Route::resource('locations', 'LocationController')->only([
        'index', 'show', 'store'
    ]);
});