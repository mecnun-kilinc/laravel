<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Home;
use App\Http\Controllers\Admin\PanelArticle;
use App\Http\Controllers\Admin\AdminAuthController;





Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::group(['middleware' => 'adminauth'], function () {

        Route::get('/admin', [Home::class, 'index']);
        Route::get('/admin/article', [PanelArticle::class, 'index']);
        Route::get('/admin/article/add', [PanelArticle::class, 'add']);
        Route::get('/admin/article/edit/{article_id}', [PanelArticle::class, 'edit']);
        Route::post('/admin/article/addArticle', [PanelArticle::class, 'addArticle']);
        Route::post('/admin/article/editArticle', [PanelArticle::class, 'editArticle']);
        Route::post('/admin/article/delete', [PanelArticle::class, 'delete']);


    });

});

