<?php

namespace App\Http\Controllers;

use App\Models\LearningPath;
use Inertia\Inertia;
use Inertia\Response;

class LearningPathController extends Controller
{
    public function index(): Response
    {
        $learningPaths = LearningPath::query()
            ->with('media')
            ->get();

        return Inertia::render('LearningPaths/Index', [
            'learningPaths' => $learningPaths,
        ]);
    }

    public function show(LearningPath $learningPath): Response
    {
        return Inertia::render('LearningPaths/Show', [
            'learningPath' => $learningPath,
        ]);
    }
}
