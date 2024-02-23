<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PanelArticleModel as model;

class Article extends Controller {


    public function index(Request $request)
    {

        $articles = model::search($request);

        $data = [
            'title' => 'Admin Article List',
            'description' => 'Admin Article List Description',
            'results' => $articles,
        ];

        return view('admin.articles', $data);
    }

    public function add()
    {


        $data = [
            'title' => 'Admin Article List',
            'description' => 'Admin Article List Description',
            'result' => [],
            'action' => '/panel/article/addArticle'
        ];


        return view('admin.article_form', $data);
    }

    public function edit($article_id)
    {

        $article = model::getArticle($article_id);

        $data = [
            'title' => 'Admin Article List',
            'description' => 'Admin Article List Description',
            'result' => $article,
            'action' => '/panel/article/editArticle'
        ];

        return view('admin.article_form', $data);
    }

    public function addArticle(Request $request)
    {

        // NOTE Normal şartlarda bu alana yetkisiz kişiler ulaşamaz ama biz ulaşanlarıda kontrol edelim.
        // TODO İçeriği ekleyenin yetkisi varmı bakılacak yapılacak

        $seoUrlKontrolu = model::seoUrlCheck($request->article_id, $request->seourl);

        if ($seoUrlKontrolu) {

            return redirect()->back()->with('error', 'Already in use.');
        }

        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'description' => 'required',
            'meta_title'  => 'required|max:70',
        ]);

        model::add($request);

        return redirect()->route('article.index');
    }

    public function editArticle(Request $request)
    {

        // TODO Birden fazla editör veya Yöneticiler için: Düzenlendiği içerik kendisinemi ait kontrolü yapılabilir.
        $seoUrlKontrolu = model::seoUrlCheck($request->article_id, $request->seourl);

        if ($seoUrlKontrolu) {

            return redirect()->back()->with('error', 'Already in use.');
        }

        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'description' => 'required',
            'meta_title'  => 'required|max:70',
        ]);

        model::edit($request->article_id, $request);

        return redirect()->route('article.index');
    }

    public function delete(Request $request)
    {

        // TODO Birden fazla editör veya Yöneticiler için: Sildiği içerik kendisinemi ait kontrolü yapılabilir.
        $response = model::destroy($request->selected);

        return redirect()->back()->with('message', "Successfully removed.");
    }


}
