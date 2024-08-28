<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/images', 'App\Http\Controllers\ImageController@store')->name('images.store');

Route::get('/images/{id}', 'App\Http\Controllers\ImageController@show')->name('images.show');

Route::get('/images', 'App\Http\Controllers\ImageController@index')->name('images.index');