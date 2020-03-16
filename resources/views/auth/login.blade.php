@extends('layouts.app')

@section('content')
    <div class="container center-vertical">
        <div class="login-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="text-center">
                    <i class="fa fa-sign-in fa-5x" aria-hidden="true"></i>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your Email">

                    @error('email')
                    <span class="alert alert-danger" style="
                        padding: 3px 5px;
                        width: 100%;
                        display: block;
                    ">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">

                    @error('password')
                    <span class="alert alert-danger" style="
                        padding: 3px 5px;
                        width: 100%;
                        display: block;
                    ">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
