<?php

Route::get('/how-to-addon/', 'VideosController@index')->name('howToAddon.index');
Route::get('/how-to-addon/create', 'VideosController@create')->name('howToAddon.create');
Route::get('/how-to-addon/video/{video}', 'VideosController@show')->name('howToAddon.show');