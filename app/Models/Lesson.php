<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    use HasUuids;

    protected $fillable = [
        'course_id',
        'name',
        'content',
        'youtube_id',
        'time_duration',
    ];

    protected $appends = [
        'youtube_url',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    protected function youtubeUrl(): Attribute
    {
        return Attribute::get(fn () => "https://youtube.com/embed/$this->youtube_id");
    }
}
