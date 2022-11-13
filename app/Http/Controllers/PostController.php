<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
    }

    public function show(string $slug)
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->with('user')
            ->firstOrFail();

        $post->increment('views');

        return Inertia::render('Post', [
            'post' => $post,
        ]);
    }
}
