<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Articles as ModelArticles;

class Articles extends Controller {

   public function search (Request $request) {

    if (strlen($request->ara) < 3) {

        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }

    $articles = ModelArticles::search($request);

    $data = [
        'title' => 'Search Results',
        'description' => 'Search Results Description',
        'results' => $articles,
    ];


   return view("catalog.search", $data);


   }



   public function show ($seourl) {

    $result = ModelArticles::show($seourl);

    $data = [
        'title' => 'Search Results',
        'description' => 'Search Results Description',
        'result' => $result,
    ];


   return view("catalog.article", $data);

   }



}
