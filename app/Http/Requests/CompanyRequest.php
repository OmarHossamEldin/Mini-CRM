<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => "required|string|unique:companies,name,{$this->company?->id}",
            'email'  => "required|email|unique:companies,email,{$this->company?->id}",
            'logo'   => "required|mimes:jpg,bmp,png|dimensions:min_width=100,min_height=100|unique:companies,logo,{$this->company?->id}",
            'website'=> "required|url|unique:companies,website,{$this->company?->id}"
        ];
    }
}
