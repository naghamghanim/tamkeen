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
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|integer',
            'gender' => 'required|max:1',
            'empNo' => 'required|integer',
            'department_id'=>'required',
            'city_id'=>'required',
            'image'=>'required|image'
        ];
    }
}
