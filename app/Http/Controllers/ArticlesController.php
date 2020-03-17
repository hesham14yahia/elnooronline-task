<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = auth()->user()->articles()->paginate(5);

        return view('user.profile', [
            'articles' => $articles
        ]);
    }
}
