<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
Route::get('/logout', 'Api\AuthController@logout')->middleware('auth:api');


Route::get('/users', 'Api\UserController@index')->name('users.index')->middleware('auth:api');
Route::get('/user/{user_id}/bankaccount', 'Api\BankAccountController@index')->middleware('auth:api');


Route::get('/user/{user_id}/jobs', 'Api\JobController@index')->middleware('auth:api');


Route::post('/loan', 'Api\LoanApplicationController@store')->middleware('auth:api');
Route::get('/loan', 'Api\LoanApplicationController@index')->middleware('auth:api');
Route::get('/loan/{loan_id}', 'Api\LoanApplicationController@show')->middleware('auth:api');
Route::put('/loan/{loan_id}', 'Api\LoanApplicationController@update')->middleware('auth:api');
Route::delete('/loan/{loan_id}', 'Api\LoanApplicationController@destroy')->middleware('auth:api');
