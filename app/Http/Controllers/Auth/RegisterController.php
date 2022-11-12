<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return inertia('Auth/Register');
    }

    public function register(RegisterRequest $request)
    {

    }
}
