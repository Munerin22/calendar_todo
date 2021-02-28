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

//User$B%m%0%$%s8e$K%"%/%;%92D(B
Route::group(['middleware' => 'auth'], function() {;
		//ToDo$BDI2C(B
		Route::get('/todo/add', function () {
				return view('todo.add');
		})->name('todo_add_form');
		Route::post('/todo/add', 'TodoController@add')->name('todo_add');

		//ToDo$BJT=8(B
		Route::get('/todo/edit/{id?}', 'TodoController@edit')->name('todo_edit_form');
		Route::post('/todo/edit/update', 'TodoController@update')->name('todo_update');

		Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});
