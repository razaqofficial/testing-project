<?php

Route::post('login','Auth\LoginController@login')->name('login');

Route::get('/','HomeController@index')->name('index');

Route::post('create/user','HomeController@createUser')->name('create.user');

Route::get('delete/user/{user_id}','HomeController@deleteUser')->name('delete.user');
