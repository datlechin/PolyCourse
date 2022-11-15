<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'slug',
        'subtitle',
        'description',
        'level',
        'price',
        'trailer',
    ];

    protected $appends = [
        'thumbnail_url',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function learnGoals(): HasMany
    {
        return $this->hasMany(CourseLearnGoal::class);
    }

    public function requirements(): HasMany
    {
        return $this->hasMany(CourseRequirement::class);
    }

    protected function thumbnailUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('courses'),
        );
    }
}
