<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class worklogFormRequest extends FormRequest
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
            'work' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'hours_worked' => ['required', 'gte:0', 'lte:8']
        ];
        return $rules;
    }
}
