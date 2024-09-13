<?php

use App\Controllers;
use System\Base\Request;
use System\Base\Route;

Route::post('login', [Controllers\Auth\LoginController::class, 'show'])->name('login');
Route::get('profile/{id}/{user}', [Controllers\Auth\LoginController::class, 'show'])->name('bosee');
Route::get('profile/verify', [Controllers\ChatController::class, 'show']);
Route::get('profile', fn(Request $request) => response(['message' => 'Hello']));
// dd(Route::routes('login'));
// include ROOT . '/views/index.php';
