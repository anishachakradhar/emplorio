<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email,NULL,id,deleted_at,NULL',
            'phone' => 'required|numeric|digits:10|min:0|unique:employees,phone,NULL,id,deleted_at,NULL',
            'address' => 'required|string',
            'dob' => 'required|date',
        ];
    }
}
