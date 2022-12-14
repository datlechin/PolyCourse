<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index(): Response
    {
        $posts = Post::query()
            ->with(['author', 'media'])
            ->paginate();

        return Inertia::render('Blog/Index', [
            'posts' => $posts,
        ]);
    }

    public function show(string $slug): Response
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->with('author')
            ->firstOrFail();

        $post->increment('views');

        return Inertia::render('Blog/Show', [
            'post' => $post,
        ]);
    }
}
