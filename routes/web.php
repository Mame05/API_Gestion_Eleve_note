<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/login', function () {
    // Return a view or handle login page for web
})->name('login');*/
