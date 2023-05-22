<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\LawResource;
use App\Models\Law;

class LawController extends Controller
{
    public function index()
    {
        return LawResource::collection(Law::all());
    }
    public function id(int $id)
    {
        return new LawResource(Law::find($id));
    }
}
