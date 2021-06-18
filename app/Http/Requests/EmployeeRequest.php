<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName'   => "required|string",
            'lastName'    => "required|string",
            'email'       => "required|email|unique:employees,email,{$this->employee?->id}",
            'company_id'  => "required|exists:App\Models\Company,id"
        ];
    }
}
