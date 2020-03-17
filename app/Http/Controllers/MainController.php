<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(5);
        $users = User::get()->take(20);

        return view('main.index', [
            'articles' => $articles,
            'users' => $users
        ]);
    }
}
