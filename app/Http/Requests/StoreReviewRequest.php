<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id',
            'rating' => 'required|numeric|min:1|max:5',
            'content' => 'required|string|max:500',
        ];
    }
}
