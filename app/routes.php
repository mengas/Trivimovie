<?php

Route::get('/', function()
{
    return App::make('HomeController')->getIndex();
});

Route::get('/games', function() {
    return App::make('HomeController')->getGames();
});

Route::get('/movies', function() {
    return App::make('HomeController')->getMovies();
});

Route::get('/random', function() {
    return App::make('HomeController')->getRandom();
});

Route::get('/actors', function() {
    return App::make('HomeController')->getActors();
});