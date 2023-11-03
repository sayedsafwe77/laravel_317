<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password)) return response()->json(['message' => 'invalid credentials']);
        $token = $user->createToken('user_token');
        return response()->json(['user' => $user, 'token' => $token->plainTextToken]);
    }
    function profile()
    {
        return response()->json(['user' => Auth::user()]);
    }
}
