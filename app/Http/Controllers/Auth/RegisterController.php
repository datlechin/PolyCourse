<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(RegisterRequest $request)
    {

    }
}
