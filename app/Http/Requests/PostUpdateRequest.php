<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostUpdateRequest extends Request
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
            'content' => 'required',
            'price' => 'required|numeric|min:2',
            'condition' => 'required',
            'is_negotiable' => 'required',
            'home_delivary' => 'required',
            'warranty' => 'required',
            'featuredimage'  => 'image|max:3000'
        ];
    }
    public function messages()
    {
        return [
            'content.required'  => 'Ad. Content is Required',
            'price.required' => 'Price is Required.',
            'condition.required' => 'Ad Condition is Required.',
            'home_delivary.required' => 'Home Delivary is Required.',
            'warranty.required' => 'Warranty is Required.',
            'is_negotiable.required' => 'Price Negotiable is Required',
        ];
    }
}
