<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true; 
    }

   
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|min:8',
            'section_id' => 'required|exists:sections,id',
            'phone' => ['required', 'regex:/^(\+20|01|05|966|971)[0-9]{8,}$/'],
            'name' => 'required|string|max:255',
            'appointments' => 'required|array',
        ];
    }

  
    public function messages(): array
    {
        return trans('validation');
    }
}