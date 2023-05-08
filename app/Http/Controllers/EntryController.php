<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Http\Resources\EntryResource;

class EntryController extends Controller
{
    public function index(Request $request)
    {
        //get the user from the request
        $user = $request->user();
        $class = $user->restrictionClass;
        //get all entries and files where the restrictionClass is lower or equal to the user restrictionClass
        $entries = Entry::whereHas('files', function ($query) use ($class) {
            $query->where('restrictionClass', '<=', $class);
        })->get();
        return EntryResource::collection($entries);
    }

    public function id(int $id)
    {
        return new EntryResource(Entry::find($id));
    }
    public function store(Request $request)
    {
        $entry = new Entry();
        $entry->identification = $request->identification;
        $entry->age = $request->age;
        $entry->save();
        return new EntryResource($entry);
    }
}
