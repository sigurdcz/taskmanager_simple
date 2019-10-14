<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function getDateCreatedAttribute()
    {
        return Date('d. m. yyyy H:i:s');
    }
}
