<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TranslateController;



Route::get('/',[PagesController::class,'root'])->name('root');

// vendor/laravel/ui/src/AuthRouteMethods.php
Auth::routes(['verify' => true]);

Route::resource('users',UsersController::class,['only' => ['show','edit','update']]);

Route::resource('topics', TopicsController::class, ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('categories',CategoriesController::class,['only' => ['show']]);

Route::post('upload_image',[TopicsController::class,'upload_image'])->name('topics.upload_image');

//google translate API
Route::post('/translate/ajax', [TranslateController::class, 'translate'])->name('translate.translate');

Route::resource('replies', 'RepliesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);