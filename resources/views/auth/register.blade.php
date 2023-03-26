@extends('layouts.default')

@section('content')
    <div class="auth-wrapper">
        <h4>Registration is FREE, safe and easy</h4>
        <form action="/create_user" method="post">
            @csrf
            <section>
                <h2>Account Information</h2>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{old('name')}}">
                    @error('name')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}">
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
                <div>
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password2">
                    @error('password_confirmation')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
            </section>
            <section>
                <h2>Address</h2>
                <div>
                    <label for="address1">Address Line 1</label>
                    <input type="text" name="address_1" id="address1" placeholder="e.g: 15B High Street" value="{{old('address_1')}}">
                    @error('address_1')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="address2">Address Line 2</label>
                    <input type="text" name="address_2" id="address2" placeholder="e.g: North District, Town/City" {{old('address_2')}}>
                    @error('address_2')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="address_postcode">Post Code</label>
                    <input type="text" name="address_postcode" id="address_postcode" placeholder="e.g: EH12 1GT" {{old('address_postcode')}}>
                    @error('address_postcode')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="country">Country</label>
                    <select name="country" id="country">
                        @include('includes.country-select')
                    </select>
                </div>
            </section>
            <section class="agree-submit">
                <p>After registration, you will be able to add a credit/debit card or add a PayPal account.</p>
                <div class="reg-agree">
                    <label class="reg-agree-label" for="reg-agree-input">
                        <i class="bi bi-check reg-agree-checkmark"></i>
                    </label>
                    <input class="reg-agree-input" type="checkbox" name="reg-agree" id="reg-agree-input" hidden>
                    <p>I agree to the <a href="#">T&Cs</a> and that I am 16 years or over.</p>
                    @error('reg-agree')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="buttons">
                    <button class="btn btn-primary" type="submit">Register</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </div>
            </section>

        </form>
    </div>
@endsection
