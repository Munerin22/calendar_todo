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

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', 'CalendarController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/todo/detail/{id?}', 'TodoController@detail')->name('todo_detail');

//Userログイン後にアクセス可
Route::group(['middleware' => 'auth'], function() {;
		//ToDo処理
		Route::get('/todo/add', function () {
				return view('todo.add');
		})->name('todo_add_form');
		Route::post('/todo/add', 'TodoController@add')->name('todo_add');

		Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});
