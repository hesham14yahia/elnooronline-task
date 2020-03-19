<div class="panel panel-default user-post-panel">
    <div class="panel-heading">
        <div class="row">
            <img data-src="holder.js/50x50" class="img user-avatar img-circle pull-left">
        </div>

    </div>
    <div class="panel-body">
        <form action="{{ isset($get_article) ? route('articles.update') : route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($get_article))
            <input type="hidden" name="article_id" value="{{ $get_article->id }}">
            @endif
            <textarea name="body" rows="5" class="form-control" placeholder="What's on your mind, {{ auth()->user()->name }}?">{{ old('body') ?? ( isset($get_article->body) ? $get_article->body : null) }}</textarea>
            <br>
            <input type="file" name="image" class="hidden input-image" id="input-image">
            <button type="submit" class="btn btn-primary pull-right">Post</button>
        </form>
    </div>
    <div class="panel-footer">
        @if (old('image'))
        <img src="{{ old('image') }}" width="250px" class="img img-rounded img-thumbnail" style="
            width: 250px;
            height: auto;
        ">
        @else
            @if (isset($get_article->image))
            <img src="{{ $get_article->imageUrl }}" width="250px"img class="img-rounded img-thumbnail" style="
                width: 250px;
                height: auto;
            ">
            @endif
        @endif
        <label for="input-image" class="upload-label" title="upload photo">
            <img data-src="holder.js/250x150?text=Upload Photo" class="img img-rounded img-thumbnail">
        </label>
    </div>
</div>
