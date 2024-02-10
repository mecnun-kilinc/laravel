<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model
{
    use HasFactory;

    public static function search($data){


    $queries = DB::table("articles")->where('name', 'LIKE','%'. $data .'%')
    ->orWhere('description', 'LIKE','%'. $data .'%')
    ->paginate(16);

    return $queries;


    }



    public static function show($id){

        $query = DB::table("articles")->where('id', $id)->first();

        return $query;


        }





}
