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
// RESOURCES pouzito pro mozne rozsireni
Route::resource('tasks', 'Frontend\TaskController');
Route::resource('comments', 'Frontend\CommentController');
Route::get('ajax-tasks','Frontend\TaskController@ajax_index')->name('ajax-tasks');