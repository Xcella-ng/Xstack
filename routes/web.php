<?php

use App\Controllers;
use Hodos\Base\Request;
use Hodos\Base\Route;

Route::get('', [Controllers\ChatController::class, 'show']);
Route::get('profile', fn (Request $request) => view('index.m'));
Route::get('profile/{id}/{user}', [Controllers\Auth\LoginController::class, 'show'])->name('bosee');
Route::get('profile/verify', [Controllers\ChatController::class, 'show']);
Route::get('login/{user}', [Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('login/{user}', [Controllers\Auth\LoginController::class, 'show'])->name('login');
Route::patch('login/{user}', [Controllers\Auth\LoginController::class, 'show'])->name('login');
// Route::get('login/{user}', [Controllers\Auth\LoginController::class, 'index'])->name('login');

