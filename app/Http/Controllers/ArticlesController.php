<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('top_view'))
            $articles = auth()->user()->articles()->orderBy('id', 'DESC');
        else
            $articles = auth()->user()->articles()->orderBy('id', 'DESC');

        $articles = $articles->paginate(5);

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
        return redirect()->back()->with([
            "success" => "Article created successfully"
        ]);
    }


    public function like($id)
    {
        // fetch article
        $article = Article::findOrFail($id);

        // check if user already like article
        if ($article->liked(auth()->user())) {

            // remove like
            $article->likes_users()->detach(auth()->user()->id);

            // decrease article most liked
            $article->update([
                'most_liked' => $article->most_liked ?? $article->most_liked - 1
            ]);
        } else {

            // check if user dislike article
            if ($article->disliked(auth()->user())) {

                // remove dislike
                $article->dislikes_users()->detach(auth()->user()->id);

                // increase article most liked
                $article->update([
                    'most_liked' => $article->most_liked + 1
                ]);
            }

            // like article
            $article->likes_users()->attach(auth()->user()->id);

            // increase article most liked
            $article->update([
                'most_liked' => $article->most_liked + 1
            ]);
        }

        // redirect back to view
        return redirect()->back();
    }


    public function dislike($id)
    {
        // fetch article
        $article = Article::findOrFail($id);

        // check if user already dislike article
        if ($article->disliked(auth()->user())) {

            // remove dislike
            $article->dislikes_users()->detach(auth()->user()->id);

            // increase article most liked
            $article->update([
                'most_liked' => $article->most_liked + 1
            ]);
        } else {

            // check if user like article
            if ($article->liked(auth()->user())) {

                // remove like
                $article->likes_users()->detach(auth()->user()->id);

                // decrease article most liked
                $article->update([
                    'most_liked' => $article->most_liked ?? $article->most_liked - 1
                ]);
            }

            // dislike article
            $article->dislikes_users()->attach(auth()->user()->id);

            // decrease article most liked
            $article->update([
                'most_liked' => $article->most_liked ?? $article->most_liked - 1
            ]);
        }

        // redirect back to view
        return redirect()->back();
    }


    public function update(ArticleRequest $request)
    {
        // update article
        $request->updateArticle();

        // return to home or profile
        return redirect()->back()->with([
            "success" => "Article updated successfully"
        ]);
    }


    public function delete(ArticleRequest $request)
    {
        // delete article
        $request->deleteArticle();

        // return to home or profile
        return redirect()->back()->with([
            "success" => "Article deleted successfully"
        ]);
    }
}
