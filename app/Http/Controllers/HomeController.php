<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;

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

        return inertia('Home', [
            'courses' => $courses,
            'posts' => $posts,
        ]);
    }
}
