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

Route::group(["middleware" => ['cors', 'json.response']],function(){
    
    Route::get('companies', 'App\Http\Controllers\Api\CompanyController@index')->name('companies.list');

    Route::get('employees', 'App\Http\Controllers\Api\EmployeeController@index')->name('employees.list');

});