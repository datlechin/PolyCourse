<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;
use Inertia\Response;

class LearningController extends Controller
{
    public function __invoke(string $course, string $lesson): Response
    {
        $course = Course::query()
            ->where('slug', $course)
            ->with(['lessons', 'reviews' => function ($query) {
                $query->with('author')->latest();
            }])
            ->withWhereHas('lesson', function ($query) use ($lesson) {
                $query->where('id', $lesson);
            })
            ->firstOrFail();

        return Inertia::render('Learning', [
            'course' => $course,
        ]);
    }
}
