<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->withSum('lessons as lessons_time_duration', 'time_duration')
            ->withCount('lessons')
            ->withExists(['students as is_enrolled' => function (Builder $query) {
                $query->where('user_id', Auth::id());
            }])
            ->firstOrFail();

        if ($course->is_enrolled) {
            return to_route('learning', ['course' => $course->slug, 'lesson' => $course->lessons->first()]);
        }

        return Inertia::render('Courses/Show', [
            'course' => $course,
        ]);
    }

    public function subscribe(Request $request, string $slug): RedirectResponse
    {
        $user = $request->user();
        $course = Course::query()
            ->where('slug', $slug)
            ->with('lesson', function ($query) {
                $query->oldest();
            })
            ->withExists(['students as is_enrolled' => function (Builder $query) {
                $query->where('user_id', Auth::id());
            }])
            ->firstOrFail();

        if ($course->is_enrolled) {
            return to_route('learning', ['course' => $course, 'lesson' => $course->lesson]);
        }

        $course->students()->attach($user);

        return to_route('learning', ['course' => $course, 'lesson' => $course->lesson])->with('success', 'Đăng ký khoá học thành công');
    }
}
