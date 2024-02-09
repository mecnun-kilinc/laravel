<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class Home extends Controller
{


    public function index() {


        $metaData = [
            'metaTitle' => 'Admin Panel',
            'metaDescription' => 'Admin Panel Description'
        ];

        return view('admin.home', $metaData);


    }



}
