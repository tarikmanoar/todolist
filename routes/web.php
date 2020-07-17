<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('todo', 'TodoController');
Route::get('varification/{token}', 'HomeController@verify')->name('varification');
Route::resource('post', 'PostController');
Route::get('userPost/{id}', 'UserPostController@index')->name('userPost');
Route::get('admin', 'HomeController@admin')->name('admin')->middleware('admin');

Route::get('vue-todo', 'VueTodoController@index')->name('vueTodo.index');
Route::post('vue-todo', 'VueTodoController@store');
