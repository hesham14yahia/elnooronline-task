@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <!-- Form errors messages -->
            <div class="col-md-12">
                @include('components.system_messages')
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

                <!-- Article Ordering -->
                @include('components.articles_ordering')
                <!-- /Article Ordering -->

                <!-- User Articles -->
                @foreach ($articles as $article)
                @include('components.article')
                @endforeach
                <!-- /User Articles -->

                <!-- Pagination -->
                {{ $articles->links() }}
                <!-- /Pagination -->

            </div>
        </div>
    </div>
@endsection
