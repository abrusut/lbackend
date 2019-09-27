<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('users', 'API\UserController');
Route::apiResource('evaluation', 'API\EvaluationController');

Route::get('/users-paginate/size/{size}', 'API\UserController@getAllPaginate');
Route::get('/evaluate-paginate/size/{size}', 'API\EvaluationController@getAllPaginate');

//Route::get('/users/{id}', 'API\UserController@getUser');
