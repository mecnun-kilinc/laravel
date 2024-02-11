<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model {
    use HasFactory;

    public static function search($data){

    $queries = DB::table("articles")
     ->where('name', 'LIKE','%'. $data->q .'%')
     ->orWhere('description', 'LIKE','%'. $data->q .'%')
     ->paginate(16);

      return $queries;

    }


    public static function show($url){

        // UPDATE articles SET seo_url = CONCAT('demo-seo-url-', id)

        $query = DB::table("articles")->where('seo_url', $url)->first();

        return $query;


        }




}
