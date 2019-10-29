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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('tasks')->group(function (){
    Route::get('/','TaskController@index')->name('tasks.index');
    Route::get('formAdd','TaskController@getFormAdd')->name('tasks.formAdd');
    Route::post('formAdd','TaskController@add')->name('tasks.formAdd');
    Route::get('delete/{id}','TaskController@delete')->name('tasks.delete');
    Route::get('edit/{id}','TaskController@getFormEdit')->name('tasks.formEdit');
    Route::post('edit/{id}','TaskController@edit')->name('tasks.formEdit');
    Route::get('search','TaskController@search')->name('tasks.search');
});
