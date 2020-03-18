@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <!-- Form errors messages -->
            <div class="col-md-12">
                @include('components.errors')
            </div>
            <!-- /Form errors messages -->

            <div class="col-md-3">

                <!-- Our Bloggers -->
                @include('components.our_bloggers')
                <!-- /Our Bloggers -->

            </div>

            <div class="col-md-9">

                <!-- Article Form -->
                @include('components.articles_form')
                <!-- /Article Form -->

                @foreach ($articles as $article)
                <!-- User Posts -->
                @include('components.article')
                <!-- /User Posts -->
                @endforeach

                <!-- Pagination -->
                {{ $articles->links() }}
                <!-- /Pagination -->

            </div>
        </div>
    </div>
@endsection