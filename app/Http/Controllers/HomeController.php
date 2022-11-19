<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $courses = Course::query()
            ->with('media')
            ->withCount('students')
            ->limit(8)
            ->get();

        $posts = Post::query()
            ->popular()
            ->with(['author', 'media'])
            ->limit(8)
            ->get();

        return Inertia::render('Home', [
            'courses' => $courses,
            'posts' => $posts,
        ]);
    }
}
