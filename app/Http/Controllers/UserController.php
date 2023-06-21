<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function login(Request $request)
    {

        $data = $request->validate([
            'login_name' => ['required', 'min:3'],
            'login_password' => ['required', 'min:3']
        ]);

        if (auth()->attempt(['name' => $data['login_name'], 'password' => $data['login_password']])) {
            $request->session()->regenerate();
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
    
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('users')],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);



        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);
        return redirect()->route('home');
    }
}
