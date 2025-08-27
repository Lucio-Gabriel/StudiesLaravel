<?php

use App\Http\Middleware\Test1;
use App\Http\Middleware\Test2;
use App\Http\Middleware\verifyIsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('test')->group(function () {
//     Route::get('/profile', function () {
//         return 'profile';
//     });

//     Route::withoutMiddleware([Test1::class])->group(function () {
//         Route::get('/assinatura', function () {
//             return 'assinatura';
//         });

//         Route::get('/projeto', function () {
//             return 'projeto';
//         });
//     });
// });

Route::get('/user', function () {
    return 'user';
});

Route::get('/admin', function () {
    return 'admin';
})->middleware(verifyIsAdmin::class);
