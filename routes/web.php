<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/home/pesquisar', [HomeController::class, 'search'])->name('event.search')->middleware('verified');

Route::resource('/event', EventController::class)->middleware('verified');
Route::get('/agenda/export', [EventController::class, 'excelExport'])->name('event.export')->middleware('verified');