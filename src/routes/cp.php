<?php

Route::get('/how-to/', 'VideosController@index')->name('howToAddon.index');
Route::get('/how-to/create', 'VideosController@create')->name('howToAddon.create');
Route::get('/how-to/video/{video}', 'VideosController@show')->name('howToAddon.show');

Route::get('/how-to/documentation/{slug}', 'DocumentationController@show')->name('howToAddon.documentation.show');
// TODO: Clean up route names
