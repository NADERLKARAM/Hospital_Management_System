<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    /**
     * تحديد إذا كان المستخدم مسموحًا له بإجراء هذا الطلب.
     */
    public function authorize(): bool
    {
        return true; // اجعلها true للسماح بإجراء الطلب.
    }

    /**
     * قواعد التحقق من البيانات.
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|min:8',
            'section_id' => 'required|exists:sections,id',
            'phone' => ['required', 'regex:/^(\+20|01|05|966|971)[0-9]{8,}$/'],
            'price' => 'required|numeric|min:0',
            'name' => 'required|string|max:255',
            'appointments' => 'required|array',
        ];
    }

    /**
     * رسائل الخطأ المخصصة.
     */
    public function messages(): array
    {
        return trans('validation');
    }
}