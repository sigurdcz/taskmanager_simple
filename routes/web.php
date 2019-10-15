<?php

Route::get('/', 'Frontend\TaskController@index');

// RESOURCES pouzito pro mozne rozsireni
Route::resource('tasks', 'Frontend\TaskController');
Route::resource('comments', 'Frontend\CommentController');

