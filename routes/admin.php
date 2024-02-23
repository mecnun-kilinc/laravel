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
        Route::get('/', function () {
            return  "Admin";

    });
});

});

/*
Route::middleware('adminpanel')->group(function () {
Route::get('/panel', [Home::class, 'index']);
Route::get('/panel/article', [PanelArticle::class, 'index']);
Route::get('/panel/article/add', [PanelArticle::class, 'add']);
Route::get('/panel/article/edit/{article_id}', [PanelArticle::class, 'edit']);
Route::post('/panel/article/addArticle', [PanelArticle::class, 'addArticle']);
Route::post('/panel/article/editArticle', [PanelArticle::class, 'editArticle']);
Route::post('/panel/article/delete', [PanelArticle::class, 'delete']);
});
*/
