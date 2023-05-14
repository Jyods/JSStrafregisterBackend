<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryLaw extends Model
{
    use HasFactory;

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }
    public function law()
    {
        return $this->belongsTo(Law::class);
    }
}
