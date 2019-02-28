<?php

Route::get('/','EloquentController@Home');
Route::resource('tasks','TodoController');