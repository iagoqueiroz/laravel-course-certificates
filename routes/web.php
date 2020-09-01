<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mycourse/{course}/get-certification', 'HomeController@getCertification')->name('get-certification');

Route::get('certification', function() {
    $course = App\Course::find(5);
    $user = App\User::find(1);

    return \PDF::loadView('certification', ['course' => $course, 'user' => $user])->stream();
});
