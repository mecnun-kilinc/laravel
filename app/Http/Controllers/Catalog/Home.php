<?php

namespace App\Http\Controllers\Catalog;


use App\Http\Controllers\Controller;

class Home extends Controller {


    public function index() {

        $data = [
            'title' => 'Home Page Meta',
            'description' => 'Home Page Description'
        ];

         return view("catalog.home", $data);

      }




}
