<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    function loginView()
    {
        return view('auth.login');
    }
    function login(Request $request)
    {
        $validator = $this->validateLogin($request->all());
        $validator->validate();
        $guards = array_slice(config('auth.guards'), 0, -1);
        foreach (array_keys($guards) as $guard) {
            if (Auth::guard($guard)->attempt($validator->validated())) {
                return redirect()->route('order.index');
            }
        }
        return back();
    }
    function validateLogin($data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
