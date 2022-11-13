<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::query();

        return Inertia::render('Courses/Index', [
            'courses' => $courses,
        ]);
    }

    public function show(string $slug)
    {
        $course = Course::query()
            ->where('slug', $slug)
            ->with('user')
            ->firstOrFail();

        return Inertia::render('Courses/Show', [
            'course' => $course,
        ]);
    }
}
