<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = auth()->user()->articles()->paginate(5);

        return view('users.profile', [
            'articles' => $articles
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $request->storeArticle();

        return redirect()->back();
    }
}
