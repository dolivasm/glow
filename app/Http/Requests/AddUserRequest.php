<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Validator;

class AddUserRequest extends FormRequest
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
            'name'=>'required|max:255',
            'firstName'=>'required|max:255',
            'lastName'=>'nullable|max:255',
            'birthday'=>'required|date|before:'.date('Y-m-d'),
            'username'=>'required|max:255|unique:users',
            'email'=>'required|max:255|unique:users|email',
            'phone'=>'nullable|numeric|digits_between:0,10',
            'role_id'=>'required',
        ];
    }
}
