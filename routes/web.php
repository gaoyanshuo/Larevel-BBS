<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TopicsController;





Route::get('/',[PagesController::class,'root'])->name('root');

// vendor/laravel/ui/src/AuthRouteMethods.php
Auth::routes(['verify' => true]);

Route::resource('users',UsersController::class,['only' => ['show','edit','update']]);

Route::resource('topics', TopicsController::class, ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
