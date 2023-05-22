<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FileLawResource;
use App\Models\FileLaw;
use App\Models\Law;

class FileLawController extends Controller
{
    public function index(Request $request)
    {
        return FileLawResource::collection(FileLaw::all());
    }
    // create a function that returns all filelaws with the given file_id
    public function id(int $id)
    {
        return FileLawResource::collection(FileLaw::where('file_id', $id)->get());
    }
}
