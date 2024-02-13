<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Filemanager extends Controller
{



    public function index () {

        $data = [
            'metaTitle' => 'Admin Image Upload ',
            'metaDescription' => 'Admin Image Upload Description'
        ];

        return view('admin.home', $data);

    }


   public static function upload ($request) {

        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:4096'
        ]);

         $imageName = time().'.'.$request->image->extension();

         $request->image->move(public_path('images/products'), $imageName);

         return response('success', 'Image uploaded Successfully!');


   }


}
