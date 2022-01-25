<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['shortLink' => null]);
});
Route::post('/', [FormController::class, 'shorten'])->name('shorten');
