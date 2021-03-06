<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', 'HomeController@index');

Auth::routes();

Route::resource('boards', 'BoardsController');
Route::resource('boards/{board}/ideas', 'IdeasController');
