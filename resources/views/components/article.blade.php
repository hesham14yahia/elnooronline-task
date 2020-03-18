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
                            <a href="javascript:;">
                                <i class="fa fa-trash fa-lg" aria-hidden="true"></i> Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

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
        <p>
            {{ $article->body }}
        </p>
    </div>
    <!-- /Article content-->

    <div class="panel-footer">

        <!-- Like Button -->
        <span class="like-btn">
            <small class="text-muted likes">{{ $article->likes_count() }}</small>
            <a href="#" class="btn-btn-primary">
                <i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i>
            </a>
        </span>
        <!-- /Like Button -->

        <!-- Dislike Button -->
        <span class="like-btn">
            <small class="text-muted likes">{{ $article->dislikes_count() }}</small>
            <a href="#" class="btn-btn-primary">
                <i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i>
            </a>
        </span>
        <!-- /Dislike Button -->

    </div>
</div>
