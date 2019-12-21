<?php

Route::get('/how-to-addon/', 'Http\Controllers\VideosController@index')->name('howToAddon.index');
Route::get('/how-to-addon/create', 'Http\Controllers\VideosController@create')->name('howToAddon.create');