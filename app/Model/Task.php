<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
