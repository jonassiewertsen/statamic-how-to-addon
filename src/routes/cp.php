<?php

Route::get('/how-to-addon/', 'Http\Controllers\VideosController@index')->name('howToAddon.index');
Route::get('/how-to-addon/create', 'Http\Controllers\VideosController@create')->name('howToAddon.create');
Route::get('/how-to-addon/video/{video}', 'Http\Controllers\VideosController@show')->name('howToAddon.show');