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

        if (gettype($request->input('value')) !== 'string') {
            $request->merge(['value' => json_encode($request->input('value'))]);
        }

        return response()->json(Datapoint::query()->updateOrCreate(
            ['key' => $request->input('key')],
            ['value' => $request->input('value')]
        ));
    });

    Route::get('/get/{key}', function (string $key) {
        $value = Datapoint::query()->where('key', $key)->first();
        if ($value) {
            return response()->json(($value->value));
        }
        return response('', 400);
    });

    Route::delete('/delete/{key}', function (string $key) {
        return response()->json(Datapoint::query()->where('key', $key)->delete());
    });
})->middleware('auth:sanctum');
