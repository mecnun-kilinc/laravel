<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Article;
use App\Http\Controllers\Admin\AdminAuthController;


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::middleware('auth:adminpanel')->group(function () {

        Route::get('/admin', [Home::class, 'index'])->name('home');

        Route::controller(Article::class)->group(function () {
            Route::get('/admin/article', 'index');
            Route::get('/admin/article/add', 'add');
            Route::get('/admin/article/edit/{article_id}', 'edit');
            Route::post('/admin/article/addArticle', 'addArticle');
            Route::post('/admin/article/editArticle', 'editArticle');
            Route::post('/admin/article/delete', 'delete');
        });
    });
});
