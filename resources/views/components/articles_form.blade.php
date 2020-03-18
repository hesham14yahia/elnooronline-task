<div class="panel panel-default user-post-panel">
    <div class="panel-heading">
        <div class="row">
            <img data-src="holder.js/50x50" class="img user-avatar img-circle pull-left">
        </div>

    </div>
    <div class="panel-body">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea name="body" rows="5" class="form-control" placeholder="What's on your mind, {{ auth()->user()->name }}?"></textarea>
            <br>
            <input type="file" name="image" class="hidden input-image" id="input-image">
            <button type="submit" class="btn btn-primary pull-right">Post</button>
        </form>
    </div>
    <div class="panel-footer">
        <label for="input-image" class="upload-label" title="upload photo">
            <img data-src="holder.js/250x150?text=Upload Photo" class="img img-rounded img-thumbnail">
        </label>
    </div>
</div>
