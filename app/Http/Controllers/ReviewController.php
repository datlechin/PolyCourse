<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Course;
use Inertia\Inertia;

class ReviewController extends Controller
{
    public function store(Course $course, StoreReviewRequest $request)
    {
        $course->reviews()->create($request->validated());
    }
}
