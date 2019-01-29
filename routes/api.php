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

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('users', 'UserController')->only([
        'index', 'show'
    ]);

    Route::get('/city', function () {
        return new CityResource(City::find(1));
    });

    Route::get('/cities', function () {
        return CityResource::collection(City::all());
    });

});