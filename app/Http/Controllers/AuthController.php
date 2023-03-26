<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function createUser(Request $request){
        $request->validate([
            'name' => [
                'required'
            ],

            'email' => [
                'required', 'email', 'unique:users'
            ],

            'password' => [
                'required', Password::min(8)->numbers(), 'max:18', 'confirmed'
            ],

            'password_confirmation' => [
                'required'
            ],

            'address_1' => [
                'required'
            ],

            'address_2' => [
                'required'
            ],

            'address_postcode' => [
                'required', 'postal_code:GB,US,FR,DE,BE,ES,AU,NZ,CA'
            ],

            'country' => [
                'required'
            ],

            'reg-agree' => [
                'required'
            ]
        ],
        
        [
            'password_confirmation' => 'Please confirm password',
            'reg-agree' => 'You must agree to the terms and conditions.',
            'address_postcode' => 'Please enter a valid postcode.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_postcode' => $request->address_postcode,
            'country' => $request->country,
        ]);
       

        Auth::login($user);

        return redirect('/')->with('user_auth', 'You have logged in!');
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
}
