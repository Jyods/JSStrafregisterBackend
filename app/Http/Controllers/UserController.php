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
}
