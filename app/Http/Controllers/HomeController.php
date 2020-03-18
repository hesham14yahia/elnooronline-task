<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('user_id', '!=', auth()->user()->id)->orderBy('id', 'DESC')->paginate(5);
        $users = User::where('id', '!=', auth()->user()->id)->get()->take(20);

        return view('users.home', [
            'articles' => $articles,
            'users' => $users
        ]);
    }
}
