@extends('layouts.default')

@section('content')
    <div class="auth-wrapper">
        <form action="/authenticate" method="post">
            @csrf
            <section class="auth-login-section">
                <div>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email">
                    @error('email')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="password1">Password</label>
                    <input type="password" name="password" id="password1">
                    @error('password')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
            </section>
            <section class="agree-submit">
                <div class="buttons">
                    <button class="btn btn-primary" type="submit">Log In</button>
                </div>
            </section>
        </form>
    </div>
@endsection
