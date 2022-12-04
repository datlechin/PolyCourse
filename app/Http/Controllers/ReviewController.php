<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Course $course, StoreReviewRequest $request)
    {
        $course->reviews()->create([
            ...$request->validated(),
            'user_id' => Auth::id(),
        ]);

        if ($course->reviews()->whereBelongsTo(Auth::user())->exists()) {
            return back()->with('error', 'Bạn đã đánh giá khóa học này rồi');
        }

        return back()->with('success', __('Nhận xét của bạn đã được gửi đi'));
    }
}
