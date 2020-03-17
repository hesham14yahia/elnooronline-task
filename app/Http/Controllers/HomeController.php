<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::where('user_id', '!=', auth()->user()->id)->orderBy('id', 'DESC')->paginate(5);
        $users = User::where('id', '!=', auth()->user()->id)->get()->take(20);

        return view('user.home', [
            'articles' => $articles,
            'users' => $users
        ]);
    }

    public function profile()
    {
        $articles = auth()->user()->articles()->paginate(5);

        return view('user.profile', [
            'articles' => $articles
        ]);
    }
}
