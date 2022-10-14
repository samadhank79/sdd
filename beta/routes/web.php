<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$title = 'SDD Software';
    return view('home', compact('title'));
});

Route::get('/login', function () {
	$title = 'Log In | SDD Software';
    return view('login', compact('title'));
});

Route::get('/signup', function () {
	$title = 'Sign UP | SDD Software';
    return view('signup', compact('title'));
});