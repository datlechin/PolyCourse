<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:150'],
            'phone' => ['required', 'digits:10'],
            'bio' => ['required', 'string', 'max:300'],
        ];
    }
}
