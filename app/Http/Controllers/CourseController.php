<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    public function index(): Response
    {
        $courses = Course::query()
            ->with('media')
            ->withCount('students')
            ->latest()
            ->get();

        return Inertia::render('Courses/Index', [
            'courses' => $courses,
        ]);
    }

    public function show(string $slug): Response|RedirectResponse
    {
        $course = Course::query()
            ->where('slug', $slug)
            ->with(['lessons', 'learnGoals', 'requirements'])
            ->withCount('lessons')
            ->firstOrFail();

        if ($course->is_enrolled) {
            return to_route('learning', ['course' => $course->slug, 'lesson' => $course->lessons->first()]);
        }

        return Inertia::render('Courses/Show', [
            'course' => $course,
        ]);
    }

    public function subscribe(Request $request, string $slug)
    {
        $user = $request->user();
        $course = Course::query()
            ->where('slug', $slug)
            ->with('lesson', function ($query) {
                $query->oldest();
            })
            ->firstOrFail();

        if ($course->students->contains($user)) {
            return to_route('learning', ['course' => $course, 'lesson' => $course->lesson]);
        }

        $course->students()->attach($user);

        return to_route('learning', ['course' => $course, 'lesson' => $course->lesson])->with('success', 'Đăng ký khoá học thành công');
    }
}
