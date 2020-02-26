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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/table', 'TodoController@showTable');
Route::get('/', 'TodoController@showTable');
Route::get('/storeTask', 'TodoController@storeTask');
Route::get('/addtask', 'TodoController@addTask');
Route::post('/storeTask', 'TodoController@storeTask');
Route::get('/delete/task/{todo}', 'TodoController@deleteTask');
Route::post('/edit/task/{todo}', 'TodoController@editTask');
Route::get('/update/task/{todo}', 'TodoController@updateTask');
Route::get('/wrong', 'TodoController@wrongUser');

Auth::routes();

Route::get('/home', 'TodoController@showTable')->name('table');



