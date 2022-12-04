<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model
{
    protected $fillable = [
        'reviewable_type',
        'reviewable_id',
        'rating',
        'content',
    ];

    protected $casts = [
        'rating' => 'integer'
    ];

    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
}
