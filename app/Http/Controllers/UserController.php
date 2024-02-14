<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        $credentials = [
            'email' => $incomingFields['loginname'],
            'password' => $incomingFields['loginpassword']
        ];

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withInput()->withErrors(['loginname' => 'Invalid credentials']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}
