@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-3">

                <!-- All Users -->
                <h4 class="text-center">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    Our Bloggers
                </h4>
                <ul class="list-group">
                    @foreach ($users as $user)
                    <li class="list-group-item">
                        <a href="#">
                            <img data-src="holder.js/50x50" class="img img-circle">
                        </a>
                        <a href="#">
                            {{ $user->name }}
                        </a>
                    </li>
                    @endforeach

                </ul>
                <!-- /All Users -->
            </div>

            <div class="col-md-9">
                @foreach ($articles as $article)

                <!-- User Posts -->
                <div class="panel panel-default user-post-panel">

                    <div class="panel-heading">
                        <div class="row">
                            <img data-src="holder.js/50x50" class="img user-avatar img-circle pull-left">

                            <div class="pull-left">
                                <h4 class="user-name ">{{ $article->user->name }}</h4>
                                <small class="text-muted">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    {{ $article->created_at }}
                                </small>
                            </div>

                            <!-- /Post control -->
                        </div>

                    </div>
                    <!-- Post content-->
                    <div class="panel-body">
                        @if ($article->image !== null)
                            <img src="{{ $article->imageUrl }}" class="img img-responsive">
                        @endif
                        <br>
                        <p>
                            {{ $article->body }}
                        </p>
                    </div>
                    <!-- /Post content-->

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
                        <hr>
                        <!-- Dislike comment form -->

                    </div>
                </div>
                <!-- /User Posts -->
                @endforeach
                <!-- Pagination -->
                {{ $articles->links() }}
                <!-- /Pagination -->
            </div>
        </div>
    </div>
@endsection
