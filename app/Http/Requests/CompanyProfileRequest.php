<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompanyProfileRequest extends Request
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
            'companyname' => 'required',
            'companyphone' => 'required|regex:/^\+?[^a-zA-Z]{5,}$/',
            'companyphone2' => 'regex:/^\+?[^a-zA-Z]{5,}$/',
            'companyfax' => 'regex:/^\+?[^a-zA-Z]{5,}$/',
            "website" => 'url',
            'area' => 'required',
            'city' => 'required',
            'companylogo'  => 'image|max:3000'
        ];
    }

    public function messages()
    {
        return [
            'companyname.required'  => 'Company Name is Required',
            'companyphone.required'  => 'Company Phone is Required',
            'area.required'  => 'Current Location Area is Required',
            'city.required'  => 'City is Required',
        ];
    }
}
