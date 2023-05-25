<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
        return [
            'name' => [
                'required',
                'unique:view',
                'max:20'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You have to fill Name!!!',
            'name.unique'   => 'This name is already taken!!!',
            'name.max'      => 'View name allow only 20 letters!!!'
        ];
    }
}
