<?php

namespace App\Http\Controllers;

use App\Models\AdminArticles;
use Illuminate\Http\Request;

class AdminArticlesController extends Controller {


    public function index (Request $request) {

        $articles = AdminArticles::search($request);

        $data = [
            'title' => 'Admin Article List',
            'description' => 'Admin Article List Description',
            'results' => $articles,
        ];

       return view('admin.articles', $data);


       }

    public function add() {


    }

    public function edit($article_id) {

      dd($article_id);

      return "In this part we will modify existing article";


    }


    public function delete(Request $request) {

         $response = AdminArticles::destroy($request->selected);

         return redirect()->back()->with('message', "$response Successfully removed.");

    }
}
