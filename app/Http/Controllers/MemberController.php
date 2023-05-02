<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MemberResource;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return MemberResource::collection($member);
    }
}
