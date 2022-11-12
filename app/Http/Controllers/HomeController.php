<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::all();
        $posts = Post::query()
            ->popular()
            ->with('user')
            ->limit(8)
            ->get();

        return Inertia::render('Home', [
            'courses' => $courses,
            'posts' => $posts,
        ]);
    }
}
