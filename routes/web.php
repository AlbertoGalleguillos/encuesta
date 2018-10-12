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

Route::get('/', 'QuestionController@index');
Route::get('/create', 'QuestionController@create');
Route::get('/question/{question}', 'QuestionController@show');
Route::get('/question/{question}/edit', 'QuestionController@edit');
Route::put('/question/{question}', 'QuestionController@update');
Route::post('/question', 'QuestionController@store');

Route::get('/generate/{test}', 'CodeController@create');
Route::get('/code/{code}/disable', 'CodeController@disable');
Route::get('/old-codes', 'CodeController@old');
Route::get('/result/{code}', 'AnswerController@index');
