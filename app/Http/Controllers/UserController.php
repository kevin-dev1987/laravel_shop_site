<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account(){
        $user = User::where('id', auth()->user()->id)->with(['purchases'])->first();

        return view('users.dashboard', [
            'user' => $user,
        ]);
    }
}
