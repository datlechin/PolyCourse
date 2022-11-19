<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    public function index(): Response
    {
        $courses = Course::query()
            ->with('media')
            ->withCount('users')
            ->latest()
            ->get();

        return Inertia::render('Courses/Index', [
            'courses' => $courses,
        ]);
    }

    public function show(string $slug): Response
    {
        $course = Course::query()
            ->where('slug', $slug)
            ->with(['users', 'learnGoals', 'requirements'])
            ->firstOrFail();

        return Inertia::render('Courses/Show', [
            'course' => $course,
        ]);
    }
}
