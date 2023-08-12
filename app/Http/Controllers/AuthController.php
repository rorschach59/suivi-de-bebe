<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function connect(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt([
            'name' => $credentials['name'],
            'password' => $credentials['password'],
        ])) {
            $request->session()->regenerate();
            return redirect()->intended(route('home.index'));
        }

        return to_route('auth.login')
            ->withErrors([
                'name' => ''
            ])
            ->onlyInput('name');
    }
}
