<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function index()
    {
        //return all Files from the database but join the members table to get the name of the member and join main_id, author_id and merg it with entries table to get the identification of the member
        return File::join('members', 'files.main_id', '=', 'members.id')->join('entries', 'files.main_id', '=', 'entries.id')->get('*');
    }
}
