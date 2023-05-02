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
}
