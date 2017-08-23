<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRegisterRequest extends Request
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
            'account_type' => 'required',
            'companyname' => 'required_if:account_type,1',
            'username' => 'required|max:255|unique:users',
            'first_name' => 'required_if:account_type,0|max:255',
            'last_name' => 'required_if:account_type,0|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|regex:/^\+?[^a-zA-Z]{5,}$/',
            'area' => 'required',
            'city' => 'required',
            'password' => 'required|confirmed|min:6',
            'agree' => 'required',        ];
    }
    public function messages()
    {
        return [
            'companyname.required_if' => 'Company Name is required.',
        ];
    }
}
