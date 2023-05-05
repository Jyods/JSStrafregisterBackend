<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\Http\Resources\CaseResource;
use App\Models\File;

use App\Http\Resources\FileResource;

class FileController extends Controller
{
    public function index()
    {
        return FileResource::collection(File::all());
    }
    public function getid(int $id)
    {
        return new CaseResource(File::find($id));
    }
    public function store(Request $request)
    {
        $file = new File();
        $file->definition = $request->definition;
        $file->date = $request->date;
        $file->fine = $request->fine;
        $file->article = $request->article;
        $file->isRestricted = $request->isRestricted;
        $file->description = $request->description;
        $file->restrictionClass = $request->restrictionClass;
        $file->user_id = 1;
        $file->entry_id = $request->entry_id;
        $file->save();
        return $file;
    }
    public function createtestdata()
    {
        $file = new File();
        $file->definition = 'Testdefinition';
        $file->date = '2021-01-01';
        $file->fine = 100;
        $file->article = 'Testartikel';
        $file->isRestricted = false;
        $file->restrictionClass = 1;
        $file->user_id = 1;
        $file->entry_id = 1;
        $file->save();
        return new FileResource($file);
    }
}