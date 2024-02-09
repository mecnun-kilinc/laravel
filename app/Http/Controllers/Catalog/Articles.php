<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Articles as ModelArticles;
use Illuminate\Http\Request;

class Articles extends Controller
{

   public function search (Request $search) {


    $articles = ModelArticles::search($search);

    $data = [
        'title' => 'Search Results',
        'description' => 'Search Results Description',
        'results' => $articles,
    ];


   return view("catalog.search", $data);


   }



   public function show (Request $request) {


    return "detay";

   }



}
