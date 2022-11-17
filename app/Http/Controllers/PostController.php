<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->paginate();

        return Inertia::render('Blog', [
            'posts' => $posts,
        ]);
    }

    public function show(string $slug): Response
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
