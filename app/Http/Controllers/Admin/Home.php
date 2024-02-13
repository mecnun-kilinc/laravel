<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Filemanager;

class Home extends Controller {


    public function index() {

     $data = [
            'metaTitle' => 'Admin Panel',
            'metaDescription' => 'Admin Panel Description'
     ];

        return view('admin.home', $data);

    }

    public function upload(Request $upload) {

       $result = Filemanager::upload($upload);

       return response()->json($result);

    }






}
