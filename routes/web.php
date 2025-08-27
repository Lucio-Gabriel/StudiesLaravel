<?php

use App\Http\Middleware\Test1;
use App\Http\Middleware\Test2;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(Test1::class);

Route::middleware([Test1::class, Test2::class])->group(function () {
    Route::get('/users', function () {
        return ['users'];
    });

    Route::get('/profile', function () {
        return 'profile';
    });

    Route::withoutMiddleware([Test1::class])->group(function () {
        Route::get('/assinatura', function () {
            return 'assinatura';
        });

        Route::get('/projeto', function () {
            return 'projeto';
        });
    });
});

