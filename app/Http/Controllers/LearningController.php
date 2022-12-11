<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
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
            ->withExists(['reviews as is_reviewed' => function (Builder $query) {
                $query->where('user_id', Auth::id());
            }])
            ->firstOrFail();

        return Inertia::render('Learning', [
            'course' => $course,
        ]);
    }
}
