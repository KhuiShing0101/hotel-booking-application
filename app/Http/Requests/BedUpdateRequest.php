<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class BedUpdateRequest extends FormRequest
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
                Rule::unique('bed')->where(function($query) {
                    return $query
                            ->where('name', $this->name)
                            ->where('deleted_at', null);
                })->ignore(Request::input('id'))
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You have to fill Bed Name',
            'name.unique'   => 'This bed name is already taken'
        ];
    }
}
