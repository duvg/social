<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusesController;

Route::view('/', 'welcome');

Route::post('statuses', [StatusesController::class, 'store'])->name('statuses.store')->middleware('auth');

Auth::routes();

Route::view('/home', 'welcome')->name('home');
