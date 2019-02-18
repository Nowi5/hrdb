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

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('register', 'AuthController@signup');

    Route::group(['middleware' => ['auth:api']], function () {

        Route::post('logout', 'AuthController@logout');
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        Route::get('/', 'HomeController@index');

        Route::get('/user', function (Request $request) {
            return $request->user();
        })->name('user');

        Route::group(['middleware' => ['verified']], function () {
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
            Route::resource('streets', 'StreetController')->only([
                'index', 'show', 'store', 'update'
            ]);
            Route::resource('skills', 'SkillController')->only([
                'index', 'show', 'store', 'update'
            ]);
            Route::resource('simplejobpostings', 'SimpleJobpostingController')->only([
                'index', 'show', 'store', 'update', 'delete'
            ]);

            /* Nested Ressources Example
            Route::resource('photos.comments', 'PhotoCommentController')->only([
                'index', 'show', 'store', 'update'
            ]);
            */

            Route::resource('locations', 'LocationController')->only([
                'index', 'show', 'store'
            ]);
        }); //end verified
    }); //end auth api
}); //end namespace api