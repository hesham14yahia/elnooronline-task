@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-12">

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
