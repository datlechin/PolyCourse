<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'content',
        'video_url',
        'time_duration',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
