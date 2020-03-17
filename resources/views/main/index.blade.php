@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-3">

                <!-- Our Bloggers -->
                @include('components.our_bloggers')
                <!-- /Our Bloggers -->

            </div>

            <div class="col-md-9">

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
