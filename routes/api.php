<?php

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('events', function () {
    $eventRecords = Event::all();
    $events = [];
    foreach ($eventRecords as $eventRecord) {
        array_push($events, [
            'title' => $eventRecord->user->name,
            'start' => $eventRecord->start_at,
            'end' => $eventRecord->end_at,
        ]);
    }
    return response()->json($events);
});
