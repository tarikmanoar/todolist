<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('todo', 'TodoController');
Route::get('varification/{token}', 'HomeController@verify' )->name('varification');
Route::resource('post', 'PostController');
Route::get('userPost/{id}', 'UserPostController@index')->name('userPost');