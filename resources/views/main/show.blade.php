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

                <!-- Aricle -->
                @include('components.article')
                <!-- /Aricle -->

            </div>
        </div>
    </div>
@endsection
