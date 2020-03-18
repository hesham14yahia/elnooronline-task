@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <!-- Form errors messages -->
            <div class="col-md-12">
                @include('components.errors')
            </div>
            <!-- /Form errors messages -->

            <div class="col-md-12">

                <!-- Article Form -->
                @include('components.articles_form')
                <!-- /Article Form -->

                @foreach ($articles as $article)
                <!-- User articles -->
                @include('components.article')
                <!-- /User articles -->
                @endforeach

                <!-- Pagination -->
                {{ $articles->links() }}
                <!-- /Pagination -->

            </div>
        </div>
    </div>
@endsection
