<?php

/** Videos */
Route::get('/how-to/videos', 'VideosController@index')->name('howToAddon.index');
Route::get('/how-to/video/{video}', 'VideosController@show')->name('howToAddon.show');
