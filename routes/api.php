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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/questions', function () {
    return 'Hello';
});*/

Route::post('/answers', 'AnswerController@create');
Route::get('/answer/{code}', 'AnswerController@show');
Route::get('/result/{code}', 'AnswerController@votes');
Route::get('/chart/{code}', 'AnswerController@chart');
Route::get('/code/{number}', 'CodeController@show');
Route::get('/questions', 'QuestionController@all');
Route::get('/question/{id}', 'QuestionController@apiShow');
Route::post('/user/auth', 'UserController@auth');
Route::post('/facebook', 'FacebookUserController@create');

Route::post('/webclass', 'WebclassQuestionController@store');
