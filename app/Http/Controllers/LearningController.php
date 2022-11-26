<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;

class LearningController extends Controller
{
    public function __invoke(string $course, string $lesson)
    {
        $course = Course::query()
            ->where('slug', $course)
            ->with('lessons')
            ->withWhereHas('lesson', function ($query) use ($lesson) {
                $query->where('id', $lesson);
            })
            ->firstOrFail();

        return Inertia::render('Learning', [
            'course' => $course,
        ]);
    }
}
