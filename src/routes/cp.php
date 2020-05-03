<?php

/** Videos */
Route::get('/how-to/videos', 'VideosController@index')->name('howToAddon.videos.index');
Route::get('/how-to/video/{video}', 'VideosController@show')->name('howToAddon.videos.show');

/** Documentation */
Route::get('/how-to/documentation/{slug}', 'DocumentationController@show')->name('howToAddon.documentation.show');
