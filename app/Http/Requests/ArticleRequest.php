<?php

namespace App\Http\Requests;

use App\Models\Article;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    use ImageTrait;

    private $article;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->input('edit_article')) {
            /*
            * authorize to update
            * if user logged in
            * edit article id sent
            * article user is the logged in user
            */
            $this->article = Article::findOrFail($this->input('edit_article'));

            return $this->article->user_id == auth()->user()->id ?? redirect()->back();
        } else {

            // authorize to create if user logged in
            return auth()->user();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ];
    }

    // upload image
    public function uploadArticleImage()
    {
        $uploaded_image = $this->file('image');

        $this->image = $uploaded_image->storePubliclyAs('public/articles', Str::random(5) . time() . '.' . $uploaded_image->getClientOriginalExtension());

        return $this;
    }

    // create article
    public function storeArticle()
    {
        Article::create([
            'body' => $this->body,
            'image' => $this->upload_image($this->file('image'), 'articles'),
            'user_id' => auth()->user()->id
        ]);
    }

    // update article
    public function updateArticle()
    {
        $this->article->update([
            'body' => $this->body ?? $this->article->body,
            'image' => $this->upload_image($this->file('image'), 'articles', $this->article->image)
        ]);
    }
}
