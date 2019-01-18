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
	$tasks = App\Todo::latest()->get();

    return view('welcome', compact('tasks'));
});

Route::get('/vue', 'VueController@show');

Route::get('/skills', function() {

	return ['Laravel', 'Vue', 'PHP', 'JavaScript', 'Tolling'];

});

Route::post('/projects', 'ProjectsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('store', 'TaskController@create');

Route::resource('/cruds', 'CrudController', [
  'except' => ['edit', 'show', 'store']
]);

Route::get('/statuses', function() {

	return App\Status::with('user')->latest()->get();

});
