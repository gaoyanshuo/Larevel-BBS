<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;






Route::get('/',[PagesController::class,'root'])->name('root');

// vendor/laravel/ui/src/AuthRouteMethods.php
Auth::routes(['verify' => true]);

Route::resource('users',UsersController::class,['only' => ['show','edit','update']]);
