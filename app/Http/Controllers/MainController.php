<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
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
