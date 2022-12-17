<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentLesson extends Model
{
    protected $fillable = [
        'course_user_id',
        'lesson_id',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(CourseUser::class, 'course_user_id');
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
