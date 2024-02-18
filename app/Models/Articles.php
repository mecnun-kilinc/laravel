<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model {

    use HasFactory;


    public static function search($data){

    $queries = DB::table("articles")
    ->where('name', 'LIKE','%'. $data->ara .'%')
    ->orWhere('description', 'LIKE','%'. $data->ara .'%')
    ->paginate(16);

    return $queries;


    }



    public static function show($seourl){

        $query = DB::table("articles")
        ->where('seourl', $seourl)
        ->orWhere('id', $seourl)
        ->first();

        return $query;


        }





}
