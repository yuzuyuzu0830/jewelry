<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Stock extends FormRequest
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
            //
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'product' => 'required|string|max:100',
            'color' => 'nullable|string|max:50',
            'brand' => 'nullable|string|max:100',
            'price' => 'nullable|integer|max:10',
            'purchaseDate' => 'nullable',
            'main_category' => 'required',
            'category' => 'required'
        ];
    }
}
