<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Home extends Controller {


    public function index() {


        $data = [
            'title' => 'Admin Panel',
            'description' => 'Admin Panel Description'
        ];

        return view('admin.home', $data);


    }

    public function getArticleList() {

        $data = [
            'title' => 'Admin Panel getArticleList',
            'description' => 'Admin Panel Description getArticleList'
        ];

        return view('admin.article_list', $data);


    }





}
