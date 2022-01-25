<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['shortLink' => null]);
});
Route::post('/', [LinkController::class, 'shorten'])->name('shorten');
