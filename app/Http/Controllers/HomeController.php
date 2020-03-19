<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('top_view'))
            $articles = Article::where('user_id', '!=', auth()->user()->id)->orderBy('views_count', 'DESC');
        else if ($request->get('most_liked'))
            $articles = Article::where('user_id', '!=', auth()->user()->id)->orderBy('most_liked', 'DESC');
        else if ($request->get('recommended'))
            $articles = Article::where('user_id', '!=', auth()->user()->id)->orderBy('recommended', 'DESC');
        else
            $articles = Article::where('user_id', '!=', auth()->user()->id)->orderBy('id', 'DESC');

        $articles = $articles->paginate(5);

        $users = User::where('id', '!=', auth()->user()->id)->get()->take(20);

        return view('users.home', [
            'articles' => $articles,
            'users' => $users
        ]);
    }
}
