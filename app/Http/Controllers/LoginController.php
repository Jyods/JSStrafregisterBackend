<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Http\Resources\UserResource;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();
            //check if user is active
            if (!$user->isActive) {
                return response()->json(['message' => 'User is not active'], 401);
            }
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
        return response()->json(['message' => 'Please login'], 401);
    }
    public function secureSite()
    {
        return response()->json(['message' => 'You are logged in'], 200);
    }
    public function getRestrictionClass(Request $request)
    {
        $user = $request->user();
        $permissions = $user->restrictionClass;
        return response()->json(['data' => $permissions], 200);
    }
    public static function getUser() {
        $user = Auth::user();
        return $user->restrictionClass;
    }
    public static function register(Request $request) {
        $user = new User();
        $user->name = $request->identification;
        $user->email = $request->email;
        //hash password
        $user->password = bcrypt($request->password);
        $user->identification = $request->identification;
        $user->age = $request->age;
        $user->isActive = $request->isActive;
        $user->restrictionClass = $request->restrictionClass;
        $user->save();
        return new UserResource($user);
    }
    public static function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }
    public function switchActive(int $id) {
        $user = User::find($id);
        $user->isActive = !$user->isActive;
        $user->save();
        return new UserResource($user);
    }
}
