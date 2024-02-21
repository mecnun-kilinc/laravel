<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Home;
use App\Http\Controllers\Backend\Startup;
use App\Http\Controllers\Backend\PanelArticle;


Route::middleware('panel')->group(function () {

Route::get('/panel', [Home::class, 'index']);
Route::get('/panel/article', [PanelArticle::class, 'index']);
Route::get('/panel/article/add', [PanelArticle::class, 'add']);
Route::get('/panel/article/edit/{article_id}', [PanelArticle::class, 'edit']);
Route::post('/panel/article/addArticle', [PanelArticle::class, 'addArticle']);
Route::post('/panel/article/editArticle', [PanelArticle::class, 'editArticle']);
Route::post('/panel/article/delete', [PanelArticle::class, 'delete']);

});
