<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\File;

use App\Mail\UpdateEmail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        //return UserResource::collection($user) but sort by rank desc
        return UserResource::collection($user->sortByDesc('rank_id'));
        
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
        $user->email = $request->email;
        $user->password = $request->password;
        $user->identification = $request->identification;
        $user->isActive = $request->isActive;
        $user->restrictionClass = $request->restrictionClass;
        $user->save();
        return new UserResource($user);
    }
    public function update(Request $request)
    {
        $old_values = User::find($request->id);
        $user = User::find($request->id);
        $user->email = $request->email ?? $user->email;
        $user->password = $request->password ?? $user->password;
        $user->identification = $request->identification ?? $user->identification;
        $user->isActive = $request->isActive ?? $user->isActive;
        $user->restrictionClass = $request->restrictionClass ?? $user->restrictionClass;
        $user->rank_id = $request->rank_id ?? $user->rank_id;
        $user->save();
        try {
            Mail::to($user->email)->send(new UpdateEmail($old_values, $user, $request->user()->identification));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return new UserResource($user);
    }
}
