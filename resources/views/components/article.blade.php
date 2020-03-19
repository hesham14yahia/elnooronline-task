<div class="panel panel-default user-post-panel">

    <div class="panel-heading">
        <div class="row">
            <img data-src="holder.js/50x50" class="img user-avatar img-circle pull-left">

            <div class="pull-left">
                <h4 class="user-name ">{{ $article->user->name }}</h4>
                <small class="text-muted">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    {{ humanize($article->created_at) }}
                </small>
            </div>

            @if (\Illuminate\Support\Str::contains(request()->url(), 'profile'))
            <!-- Article control -->
            <div class="pull-right">
                <!-- Single button -->
                <div class="btn-group post-control">
                    <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('profile') . '?edit_aricle=' . $article->id }}">
                                <i class="fa fa-edit fa-lg" aria-hidden="true"></i> Edit
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a data-toggle="modal" href="#modal-id{{ $article->id }}">
                                <i class="fa fa-trash fa-lg" aria-hidden="true"></i> Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Delete Article Form -->
            <div class="modal fade" id="modal-id{{ $article->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title">Delete Article</h4>
                        </div>
                        <div class="modal-body">
                            <p class="alert alert-danger">Are you sure ?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('articles.delete') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Edit Post Form -->

            <!-- /Article control -->
            @endif

        </div>

    </div>

    <!-- Article content-->
    <div class="panel-body">
        @if ($article->image !== null)
            <img src="{{ $article->imageUrl }}" class="img img-responsive">
        @endif
        <br>
        <a href="{{ route('main.show', $article->id) }}" class="link-unstyled">

        <p>
            {{ $article->body }}
        </p>
        </a>
    </div>
    <!-- /Article content-->

    <div class="panel-footer">

        <!-- Like Button -->
        <span class="like-btn">
            <small class="text-muted likes">{{ $article->likes_count() }}</small>
            <a href="{{ route('articles.like', $article->id) }}" class="btn-btn-primary {{ $article->liked(auth()->user()) ? '' : 'btn-default' }}">
                <i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i>
            </a>
        </span>
        <!-- /Like Button -->

        <!-- Dislike Button -->
        <span class="like-btn">
            <small class="text-muted likes">{{ $article->dislikes_count() }}</small>
            <a href="{{ route('articles.dislike', $article->id) }}" class="btn-btn-primary {{ $article->disliked(auth()->user()) ? '' : 'btn-default' }}">
                <i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i>
            </a>
        </span>
        <!-- /Dislike Button -->

    </div>
</div>
