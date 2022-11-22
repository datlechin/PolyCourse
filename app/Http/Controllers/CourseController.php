<?php

namespace App\Http\Controllers;

use App\Models\Course;
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

    public function show(string $slug): Response
    {
        $course = Course::query()
            ->where('slug', $slug)
            ->with(['lessons', 'learnGoals', 'requirements'])
            ->withCount('lessons')
            ->firstOrFail();

        return Inertia::render('Courses/Show', [
            'course' => $course,
        ]);
    }

    public function subscribe(Request $request, string $slug)
    {
        $user = $request->user();
        $course = Course::query()
            ->where('slug', $slug)
            ->firstOrFail();

        if ($course->students->contains($user)) {
            return back()->with('error', 'Bạn đã tham gia vào khoá học này rồi');
        }

        $course->students()->attach($user);

        return to_route('home')->with('success', 'Đăng ký khoá học thành công');
    }
}
