<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\File;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return UserResource::collection($user);
    }
    public function id(int $id)
    {
        //return User and all files that belong to User
        $user = User::find($id);
        $files = File::where('user_id', $id)->get();
        return new UserResource($user, $files);
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->identification = $request->identification;
        $user->age = $request->age;
        $user->isActive = $request->isActive;
        $user->restrictionClass = $request->restrictionClass;
        $user->save();
        return new UserResource($user);
    }
}
