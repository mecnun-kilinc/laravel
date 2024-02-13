<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Catalog\Home;
use App\Http\Controllers\Catalog\User;
use App\Http\Controllers\Catalog\Articles;
use App\Http\Controllers\Admin\Home as Admin;

Route::get('/', [Home::class,'index'])->name('home');


Route::controller(User::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/registerPost', 'registerPost')->name('registerPost');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});


Route::middleware('admin')->controller(Admin::class)->group(function() {
Route::get('/admin', 'dashboard');

Route::get('/admin/home', function() {
 return view('admin.home');
});

Route::post('/upload', 'upload')->name('upload');

});


Route::controller(Articles::class)->group(function () {
    Route::get('/search', 'search')->name('search');
    Route::get('/{url}', 'show')->name('show');
});
