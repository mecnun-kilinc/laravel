<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Home extends Controller
{
   
    
    public function index() {
  
        $metaData = [
            'metaTitle' => 'Home Page Meta',
            'metaDescription' => 'Home Page Description'       
        ];
    
        
         return view("catalog.home", $metaData);
    
      }




}