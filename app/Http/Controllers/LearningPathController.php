<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class LearningPathController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('LearningPaths/Index');
    }

    public function show(string $slug): Response
    {
        return Inertia::render('LearningPaths/Show');
    }
}
