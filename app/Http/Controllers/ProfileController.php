<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function __invoke(string $username)
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
