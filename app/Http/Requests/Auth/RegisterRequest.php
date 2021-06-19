<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordValidation;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => 'nullable|unique:users',
            'mobile' => 'nullable|numeric|unique:users',
            'password' => ['required', 'confirmed', new PasswordValidation]
        ];
    }
}