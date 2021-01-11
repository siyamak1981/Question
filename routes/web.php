<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('questions','QuestionController')->except('show');
Route::get('questions/{slug}', 'QuestionController@show')->name('questions.show');