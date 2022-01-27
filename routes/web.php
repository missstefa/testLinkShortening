<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['shortLink' => null]);
});
Route::post('/', [LinkController::class, 'shorten'])->name('shorten');
Route::get('/{postfix}', [LinkController::class, 'away'])->where('postfix', '\w+')->name('away');
