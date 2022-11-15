<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class   UserFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'full_name' => 'required',
            'email' => ['required', 'email'],
            'birthday' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'department_id' => 'required',
            'role_id' => 'required',
            'contract_status' => 'required',
            'contract_start_date' => 'required',
            'contract_end_date' => 'required',
            'hourly_rate' => 'required',
            'gender' => 'required'
        ];
        if (in_array($this->method(), ['POST'])) {
            $rules['email'] = ['required', 'email', Rule::unique('users', 'email')];
            $rules['photo'] = 'required';
        }

        return $rules;
    }
}
