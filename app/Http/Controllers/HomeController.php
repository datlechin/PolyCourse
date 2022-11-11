<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::all();
        $posts = Post::all();

        return inertia('Home', [
            'courses' => $courses,
            'posts' => $posts,
        ]);
    }
}
