<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OrientationFile;

use App\Http\Resources\OrientationFileResource;

class OrientationFileController extends Controller
{
    function index()
    {
        return OrientationFileResource::collection(OrientationFile::all());
    }

    function id(int $id)
    {
        return new OrientationFileResource(OrientationFile::findOrFail($id));
    }

    function store(Request $request)
    {

        $user = $request->user();
        $user_identification = $request->identification;

        $orientation_file = new OrientationFile();
        $orientation_file->name = $user_identification;
        $orientation_file->path = $request->path;
        $orientation_file->is_active = $request->is_active;
        $orientation_file->type = $request->type;
        $orientation_file->created_by = $request->created_by;
        $orientation_file->updated_by = $request->updated_by;
        $orientation_file->rank_id = $request->rank_id;
        $orientation_file->user_id = $user->id;
        $orientation_file->save();
        return new OrientationFileResource($orientation_file);
    }

    function update(Request $request, int $id)
    {
        $orientation_file = OrientationFile::findOrFail($id);
        $orientation_file->name = $request->name;
        $orientation_file->path = $request->path;
        $orientation_file->is_active = $request->is_active;
        $orientation_file->type = $request->type;
        $orientation_file->created_by = $request->created_by;
        $orientation_file->updated_by = $request->updated_by;
        $orientation_file->rank_id = $request->rank_id;
        $orientation_file->user_id = $request->user_id;
        $orientation_file->save();
        return new OrientationFileResource($orientation_file);
    }

    function destroy(int $id)
    {
        $orientation_file = OrientationFile::findOrFail($id);
        $orientation_file->delete();
        return new OrientationFileResource($orientation_file);
    }

    function restore(int $id)
    {
        $orientation_file = OrientationFile::onlyTrashed()->findOrFail($id);
        $orientation_file->restore();
        return new OrientationFileResource($orientation_file);
    }
}
