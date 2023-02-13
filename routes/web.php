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

Route::get('/', function () {
    return view('welcome');
});

Route::get('events', function () {});
Route::get('events/create', function () {});
Route::post('events', function () {});
Route::get('events/{event_id}', function () {});
Route::get('events/{event_id}/edit', function () {});
Route::put('events/{event_id}', function () {});
Route::delete('events/{event_id}', function () {});
