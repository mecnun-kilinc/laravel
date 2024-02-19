<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class AdminArticles extends Model
{

    public static function search($data = array()){


        $queries = DB::table("articles")
        ->where('name', 'LIKE','%'. $data->ara .'%')
      //  ->where('editor_id', Auth::user()->id)
        ->orWhere('description', 'LIKE','%'. $data->ara .'%')

        ->paginate(5);

        return $queries;


        }

        public static function show($id){

            $query = DB::table("articles")
            ->where('id', $id)
          //  ->where('editor_id', Auth::user()->id)
            ->first();

            return $query;


            }


            public static function destroy($data){

                $deleted = 0;

                 foreach($data as $article_id) {

                  if ($article_id) {
                    $deleted += DB::table('articles')->where('id', $article_id)->delete();
                  }


                 }

                 return $deleted;

                }



}
