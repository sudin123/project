<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
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
            'title' => 'required',
            'content' => 'required',
            'price' => 'required|numeric|min:2',
            'condition' => 'required',
            'is_negotiable' => 'required',
            'home_delivary' => 'required',
            'warranty' => 'required',
            'featuredimage'  => 'image'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Ad. Title is required',
            'content.required'  => 'Ad. Content is Required',
            'price.required' => 'Price is Required.',
            'condition.required' => 'Ad Condition is Required.',
            'home_delivary.required' => 'Home Delivary is Required.',
            'warranty.required' => 'Warranty is Required.',
            'is_negotiable.required' => 'Price Negotiable is Required',
        ];
    }
}
