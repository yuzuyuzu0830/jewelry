<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Done extends FormRequest
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
     protected function prepareForValidation()
    {
    $this->merge([
        'title' => array_filter($this->title),
    ]);
    }

    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'start' => 'required',
            'textColor' => 'required',
        ];
    }
}
