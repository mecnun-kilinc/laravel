<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class Home extends Controller {


    public function index() {


        $data = [
            'metaTitle' => 'Admin Panel',
            'metaDescription' => 'Admin Panel Description'
        ];

        return view('admin.home', $data);


    }

    public function getArticleList() {


        $data = [
            'metaTitle' => 'Admin Panel getArticleList',
            'metaDescription' => 'Admin Panel Description getArticleList'
        ];

        return view('admin.article_list', $data);


    }





}
