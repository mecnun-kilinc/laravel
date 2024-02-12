<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Articles as ModelArticles;
use Illuminate\Http\Request;

class Articles extends Controller {


   public function search (Request $request) {

    if($request->method() == "GET") {

    $articles = ModelArticles::search($request);

    $data = [
        'title' => 'Search Result',
        'description' => 'Search Result Description',
        'results' => $articles,
    ];

    }  else {

    $data = [
        'title' => 'Search Result',
        'description' => 'Search Result Description',
        'results' => 'No result were found'
    ];

    }


    return view("catalog.search", $data);

   }


   public function show ($id) {

    $result = ModelArticles::show($id);

    $data = [
        'title' => 'Search Result',
        'description' => 'Search Result Description',
        'result' => $result
    ];


   return view("catalog.article", $data);

   }



}
