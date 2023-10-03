<?php

use App\Http\Controllers\Publiccontroller;
use Illuminate\Support\Facades\Route;


Route::get('/', [Publiccontroller::class, 'welcome'])->name('home');
Route::get('/register', [Publiccontroller::class, 'register'])->name('register');
