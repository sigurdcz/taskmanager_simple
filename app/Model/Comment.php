<?php

namespace App\Model;

use App\Model\BaseModel as Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task():BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * return reformated date type
     * @return false|string
     */
    public function getDateCreatedAttribute(): Carbon
    {
        return new Carbon($this->created_at);
    }
}
