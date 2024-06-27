<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

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
    $managerRoleId = 3;

    $rules = [
        'full_name' => 'required',
        'email' => ['required', 'email'],
        'gender' => 'required',
        'birthday' => 'required',
        'contact' => 'required',
        'address' => 'required',
        'department_id' => 'required',
        'role_id' => 'required',
        'contract_status' => 'required',
        'contract_start_date' => 'required',
        'contract_end_date' => 'required',
        'hourly_rate' => 'required',
        'photo' => 'required', 
    ];

    if ($this->isMethod('POST')) {
        $rules['email'][] = Rule::unique('users', 'email');
    }
    $rules['department_id'] = [
        'required',
        Rule::unique('users', 'department_id')->where(function ($query) use ($managerRoleId) {
            return $query->where('role_id', $managerRoleId);
        })->ignore($this->user),
    ];

    return $rules;
}
public function messages()
{
    return [
        'department_id.unique' => 'The department has already been assigned to another manager.',
    ];
}
}
