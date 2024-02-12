<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class Home extends Controller
{


    public function dashboard() {


     $data = [
            'metaTitle' => 'Admin Panel',
            'metaDescription' => 'Admin Panel Description'
     ];

        return view('admin.home', $data);

    }


   public function resimYukle () {


    return "Resim Yükle";



   }




}
