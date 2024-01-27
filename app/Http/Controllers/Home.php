<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class home extends Controller {
  public function index() {
   
    $metaData = [
        'metaTitle' => 'Home Page Meta',
        'metaDescription' => 'Home Page Description'       
    ];


   return view("home", $metaData);

  }
}
