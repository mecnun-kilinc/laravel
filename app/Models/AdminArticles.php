<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class AdminArticles extends Model
{

    public static function search($data = array())
    {


        $queries = DB::table("articles")
            ->where('name', 'LIKE', '%' . $data->ara . '%')
            //  ->where('editor_id', Auth::user()->id)
            ->orWhere('description', 'LIKE', '%' . $data->ara . '%')

            ->paginate(5);

        return $queries;
    }

    public static function add($data)
    {
        $query = DB::table('articles')
            ->insert(
                [
                    'name' => $data->name,
                    'editor' => Auth::user()->name,
                    'editor_id' => Auth::user()->id,
                    'seourl' => $data->seourl,
                    'description' => $data->description,
                    'meta_title' => $data->meta_title,
                    'meta_description' => $data->meta_description,
                    'meta_keywords' => $data->meta_keywords,
                    'photo' => 'Screenshot 2024-02-08 010129.png',
                    'updated_at' => now()
                ]
            );

        return $query;
    }

    public static function edit($article_id, $data)
    {
        $query = DB::table('articles')
            ->where('id', $article_id)
            ->update(
                [
                    'name' => $data->name,
                    'seourl' => $data->seourl,
                    'description' => $data->description,
                    'meta_title' => $data->meta_title,
                    'meta_description' => $data->meta_description,
                    'meta_keywords' => $data->meta_keywords,
                    'photo' => 'Screenshot 2024-02-08 010129.png',
                    'updated_at' => now()
                ]
            );

        return $query;
    }

    public static function getArticle($article_id)
    {

        $queries = DB::table("articles")->where('id', $article_id)->first();

        return $queries;
    }

    public static function destroy($data)
    {

        foreach ($data as $article_id) {

            if ($article_id) {
                DB::table('articles')->where('id', $article_id)->delete();
            }
        }

        return true;
    }


    public static function seoUrlCheck($id, $seoUrl)
    {
        return DB::select("SELECT * FROM  articles WHERE seourl LIKE '" . $seoUrl . "' AND id != '" . $id . "'");
    }
}
