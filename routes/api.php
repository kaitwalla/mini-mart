<?php

use App\Models\Datapoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/set', function (Request $request) {
        $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        return Datapoint::query()->updateOrCreate(
            ['key' => $request->input('key')],
            ['value' => $request->input('value')]
        );
    });

    Route::get('/get/{$key}', function (string $key) {
        return Datapoint::query()->where('key', $key)->first();
    });
})->middleware('auth:sanctum');
