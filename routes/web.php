<?php

use App\Http\Controllers\EventController;
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

Route::controller(EventController::class)->group(function () {
    Route::get('events', 'index');
    Route::get('events/create', 'create');
    Route::post('events', 'store');
    Route::get('events/{event_id}', 'show');
    Route::get('events/{event_id}/edit', 'edit');
    Route::put('events/{event_id}', 'update');
    Route::delete('events/{event_id}', 'destroy');
});
