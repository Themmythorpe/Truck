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

use App\Http\Controllers\HomeController;
use App\truck;

Route::get('/', function () {
    $trucks = truck::get();

    return view('index', compact('trucks'));
});

Route::get('/pages_register', 'HomeController@reg');

Route::post('/pages_register', 'HomeController@preg');

Route::get('/pages_login', 'HomeController@login');

Route::post('/pages_login', 'HomeController@plogin');

Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth');

Route::get('/add_truck', 'HomeController@add_truckPage')->middleware('auth');

Route::post('/add_truck', 'HomeController@add_truck')->middleware('auth');

Route::get('/search', 'HomeController@sq');

Route::get('/search_query', 'HomeController@bsq')->middleware('auth');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
// Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/homep', 'HomeController@index')->name('home');
