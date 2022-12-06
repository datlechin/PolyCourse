<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function __invoke(string $username): Response
    {
        $user = User::query()
            ->where('username', $username)
            ->with('courses')
            ->firstOrFail();

        return Inertia::render('Profile', [
            'user' => $user,
        ]);
    }
}
