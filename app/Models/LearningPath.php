<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class LearningPath extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
    ];

    protected $appends = [
        'image_url'
    ];

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->getFirstMediaUrl('learning-paths'));
    }
}
