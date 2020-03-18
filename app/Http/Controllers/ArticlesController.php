<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = auth()->user()->articles()->orderBy('id', 'DESC')->paginate(5);

        // check if user want to edit article
        if ($request->get('edit_aricle')) {
            $get_article = Article::findOrFail($request->get('edit_aricle'));

            return view('users.profile', [
                'articles' => $articles,
                'get_article' => $get_article
            ]);
        }

        // return view with user articles
        return view('users.profile', [
            'articles' => $articles
        ]);
    }

    public function store(ArticleRequest $request)
    {
        // create article and upload image
        $request->storeArticle();

        // return to home or profile
        return redirect()->back();
    }

    public function update(ArticleRequest $request)
    {
        // update article
        $request->updateArticle();

        // return to home or profile
        return redirect()->back();
    }

    public function delete(ArticleRequest $request)
    {
        // delete article
        $request->deleteArticle();

        // return to home or profile
        return redirect()->back();
    }
}
