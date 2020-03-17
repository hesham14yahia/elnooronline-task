<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
        <!-- Styles -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" media="screen">
    </head>
    <body>

        <!-- Start Navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                        <!-- Guest links -->
                            <li>
                                <a href="{{ route('login') }}" class="padding-20">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                                </a>
                            </li>
                            @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="padding-20">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i> Register
                                </a>
                            </li>
                            @endif
                        <!-- /Guest links -->

                        @else

                        <!-- User Dropdown -->
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle user-dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <img data-src="holder.js/50x50" class="img img-circle">
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('profile') }}">
                                        <i class="fa fa-user fa-fw fa-lg"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user-o fa-fw fa-lg"></i> Edit Profile
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="#">
                                    </a>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-fw fa-lg"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- /User Dropdown -->
                        @endguest

                        <!-- User Notifications -->
{{--                        <li class="dropdown notification-dropdown">--}}
{{--                            <a href="#" class="dropdown-toggle padding-20" data-toggle="dropdown" role="button"--}}
{{--                               aria-haspopup="true" aria-expanded="false">--}}
{{--                                <span class="label label-danger notifications-count">1</span>--}}
{{--                                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu min-width-300">--}}
{{--                                <li>--}}
{{--                                    <div class="notify-wrap">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-xs-2">--}}
{{--                                                <a href="#">--}}
{{--                                                    <img data-src="holder.js/50x50" class="img img-circle">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-xs-10">--}}
{{--                                                <div class="notify-text">--}}
{{--                                                    <small class="notify-date text-muted">--}}
{{--                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>--}}
{{--                                                        3 hours ago--}}
{{--                                                    </small>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <h4>Ahmed Fathy</h4>--}}
{{--                                                    </a>--}}
{{--                                                    <span>Added new comment on your post</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="notify-wrap">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-xs-2">--}}
{{--                                                <a href="#">--}}
{{--                                                    <img data-src="holder.js/50x50" class="img img-circle">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-xs-10">--}}
{{--                                                <div class="notify-text">--}}
{{--                                                    <small class="notify-date text-muted">--}}
{{--                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>--}}
{{--                                                        3 hours ago--}}
{{--                                                    </small>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <h4>Ahmed Fathy</h4>--}}
{{--                                                    </a>--}}
{{--                                                    <span>Added new comment on your post</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        <!-- /User Notifications -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End Navbar -->


        <main>
            @yield('content')
        </main>


        <!-- Scripts -->
        <!-- jQuery -->
        <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
        <!-- Bootstrap JavaScript -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/holder.min.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
    </body>
</html>
