<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model
{
    use HasFactory;

    public static function search($data){

    $queries = DB::table("articles")->where('name', 'LIKE','%'. $data->q .'%')
    ->orWhere('description', 'LIKE','%'. $data->q .'%')
    ->paginate(16);

      return $queries;

    }


    public static function show($id){


        $query = DB::table("articles")->where('url', $id)->first();

        return $query;


        }




}
