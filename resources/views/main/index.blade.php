@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-3">

                <!-- All Users -->
                <h4 class="text-center">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    All Users
                </h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#">
                            <img data-src="holder.js/50x50" class="img img-circle">
                        </a>
                        <a href="#">
                            Ahmed Fathy
                        </a>
                    </li>

                </ul>
                <!-- /All Users -->
            </div>

            <div class="col-md-9">

                <!-- User Posts -->
                <div class="panel panel-default user-post-panel">

                    <div class="panel-heading">
                        <div class="row">
                            <img data-src="holder.js/50x50" class="img user-avatar img-circle pull-left">

                            <div class="pull-left">
                                <h4 class="user-name ">Ahmed Fathy</h4>
                                <small class="text-muted">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    2 hours ago
                                </small>
                            </div>

                            <!-- /Post control -->
                        </div>

                    </div>
                    <!-- Post content-->
                    <div class="panel-body">
                        <img data-src="holder.js/800x300" class="img img-responsive">
                        <br>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of
                            Lorem Ipsum.
                        </p>
                    </div>
                    <!-- /Post content-->

                    <div class="panel-footer">
                        <!-- Like Button -->
                        <span class="like-btn">
                            <small class="text-muted likes">20</small>
                            <a href="#" class="btn-btn-primary">
                                <i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i>
                            </a>
                        </span>
                        <!-- /Like Button -->

                        <!-- Dislike Button -->
                        <span class="like-btn">
                            <small class="text-muted likes">3</small>
                            <a href="#" class="btn-btn-primary">
                                <i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i>
                            </a>
                        </span>
                        <hr>
                        <!-- Dislike comment form -->

                    </div>
                </div>
                <!-- /User Posts -->
            </div>
        </div>
    </div>
@endsection
