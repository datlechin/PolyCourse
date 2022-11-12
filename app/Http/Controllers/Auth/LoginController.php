<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return inertia('Auth/Login');
    }

    public function login(LoginRequest $request)
    {
    }
}
