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
}
