<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseRequirement extends Model
{
    protected $fillable = [
        'course_id',
        'text',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
