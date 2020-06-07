<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/on-boarding', function () {
    return view('app');
})->name('install')->middleware('redirect-if-installed');

// Route::get('/test', function () {
//     echo "MAIL_MAILER=smtp\nMAIL_HOST=asd\nMAIL_PORT=123\nMAIL_USERNAME=asd\nMAIL_PASSWORD=asd\nMAIL_ENCRYPTION=tls\nMAIL_FROM_ADDRESS=asd\nMAIL_FROM_NAME='asd'\n";
// });

Route::get('/{vue?}', function () {
    return view('app');
})->where('vue', '[\/\w\.-]*')->name('home')->middleware('install');
