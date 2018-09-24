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

Route::get('/generate/{question}', 'CodeController@create');
Route::get('/code/{code}/disable', 'CodeController@disable');
Route::get('/result/{code}', 'AnswerController@index');