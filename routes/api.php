<?php

use App\Models\Datapoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::group([], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/set', function (Request $request) {

        try {
            $request->validate([
                'key' => 'required|string',
                'value' => 'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors(), 400]);
        }



        return response()->json(Datapoint::query()->updateOrCreate(
            ['key' => $request->input('key')],
            ['value' => json_encode($request->input('value'))]
        ));
    });

    Route::get('/get/{key}', function (string $key) {
        $value = Datapoint::query()->where('key', $key)->first();
        if ($value) {
            return response()->json(json_decode($value->value));
        }
        return response('', 400);
    });
})->middleware('auth:sanctum');
