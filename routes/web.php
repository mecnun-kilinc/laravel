<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Catalog\Home;
use App\Http\Controllers\Catalog\User;
use App\Http\Controllers\Catalog\Articles;
use App\Http\Controllers\Admin\Home as Admin;

Route::get('/', [Home::class,'index'])->name('home');


Route::get('/search', [Articles::class,'search'])->name('search');
Route::get('/article/{id}', [Articles::class,'show'])->name('show');



Route::controller(User::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/registerPost', 'registerPost')->name('registerPost');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(Admin::class)->group(function() {
    Route::get('/admin', 'index');
    Route::get('/admin/articles', 'getArticleList');
});
