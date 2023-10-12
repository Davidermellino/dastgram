<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Publiccontroller;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;


// Auth
Route::get('/', [Publiccontroller::class, 'welcome'])->name('home');
Route::get('/register', [Publiccontroller::class, 'register'])->name('register');

// Post
Route::get('create/post', [PostController::class, 'create'])->name('create.post');
