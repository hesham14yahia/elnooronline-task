@extends('layouts.app')

@section('content')
    <div class="container center-vertical">
        <div class="login-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="text-center">
                    <i class="fa fa-user-plus fa-5x" aria-hidden="true"></i>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" autofocus name="name" value="{{ old('name') }}" required autocomplete="name" id="name" placeholder="Enter your name">

                    @error('name')
                    <span class="alert alert-danger" style="
                        padding: 3px 5px;
                        width: 100%;
                        display: block;
                    ">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" placeholder="Enter your email">

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
                    <input type="password" class="form-control" name="password" required autocomplete="new-password" id="password" placeholder="Enter your password">

                    @error('password')
                    <span class="alert alert-danger" style="
                        padding: 3px 5px;
                        width: 100%;
                        display: block;
                    ">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" id="password-confirm" placeholder="Enter your password">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
@endsection
