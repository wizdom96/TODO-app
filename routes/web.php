<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::post('/home/addtask','TaskController@insertTask');
Route::get('/home/done/{id}','TaskController@donetask')->name('done');
Route::get('/home/delete/{id}','TaskController@deletetask')->name('delete');

Auth::routes();

Route::get('/tasks-history', 'TaskController@index');
Route::get('/home',array('as'=>'currenttasks', 'uses'=>'HomeController@index'));



