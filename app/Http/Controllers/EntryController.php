<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Http\Resources\EntryResource;

class EntryController extends Controller
{
    public function index()
    {
        return EntryResource::collection(Entry::all());
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
