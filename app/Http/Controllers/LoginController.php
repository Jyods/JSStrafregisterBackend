<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
            //return ['token' => $request->user()->createToken('auth_token')->plainTextToken];
        }
        return response()->json(['message' => 'Login failed'], 401);
    }
    public function checkAuth(Request $request)
    {
        //return $request->user(); and status code 200
        $user = $request->user();
        return response()->json(['data' => $user], 200);
    }
    public function showLogin()
    {
        return response()->json(['message' => 'Please login']);
    }
    public function secureSite()
    {
        return response()->json(['message' => 'You are logged in']);
    }
}
