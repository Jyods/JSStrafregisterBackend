<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use App\Models\File;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return MemberResource::collection($member);
    }
    public function id(int $id)
    {
        //return member and all files that belong to member
        $member = Member::find($id);
        $files = File::where('member_id', $id)->get();
        return new MemberResource($member, $files);
    }
}
