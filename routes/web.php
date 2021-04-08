<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
//        'someData' => request()->input('test') === '1' ? [1, 2, 3] : [1, 2, 3, 4, 5, 6],
    ]);
});

Route::get('/data', function () {
    return response()->json(['someData' => request()->input('test') === '1' ? [1, 2, 3] : [1, 2, 3, 4, 5, 6]]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
