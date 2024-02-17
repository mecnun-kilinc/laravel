<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
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

        DB::find();

        $data = [
            'metaTitle' => 'Admin Panel getArticleList',
            'metaDescription' => 'Admin Panel Description getArticleList'
        ];

        return view('admin.article_list', $data);


    }





}
