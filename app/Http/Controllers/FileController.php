<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

use App\Http\Resources\FileResource;

class FileController extends Controller
{
    public function index()
    {
        return FileResource::collection(File::all());
    }
    public function id(int $id)
    {
        return new FileResource(File::find($id));
    }
}
