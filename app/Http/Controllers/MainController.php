<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        if (auth()->user())
            return redirect()->route('home');

        $articles = Article::orderBy('id', 'DESC')->paginate(5);
        $users = User::get()->take(20);

        return view('main.index', [
            'articles' => $articles,
            'users' => $users
        ]);
    }


    public function show($id)
    {
        // fetch article
        $article = Article::findOrFail($id);

        if (auth()->user())
            $users = User::where('id', '!=', auth()->user()->id)->get()->take(20);
        else
            $users = User::get()->take(20);

        // Increment the view by 1
        $article->increment('views_count', 1);

        // return view with article
        return view('main.show', [
            'article' => $article,
            'users' => $users
        ]);
    }
}
