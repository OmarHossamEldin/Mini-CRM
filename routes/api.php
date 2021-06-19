<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/'], function () {
    Route::group(['middleware' => ['cors', 'json.response']], function () {
        //guest
        Route::group(['middleware' => 'guest'], function () {

            Route::post('login', 'App\Http\Controllers\Api\Auth\LoginController@login')->name('user.login');
        });
        //Authenticated 
        Route::group(['middleware' => ['auth:api']], function () {

            Route::get('companies', 'App\Http\Controllers\Api\CompanyController@index')->name('companies.list');

            Route::get('employees', 'App\Http\Controllers\Api\EmployeeController@index')->name('employees.list');

            Route::post('logout', 'App\Http\Controllers\Api\Auth\LogoutController@logout')->name('user.logout');
        });
    });
});
