<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Whoops\Run;
use Illuminate\Validation\Rule;

class AmenitiesStoreRequest extends FormRequest
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
                Rule::unique('amenities')->where(function($query) {
                    return $query
                            ->where('name', $this->name)
                            ->where('deleted_at', null);
                }),
            ],
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You have to fill Amenities Name',
            'name.unique'   => 'This name is already taken',
            'type.required' => 'You have to choose Amenities Type',
        ];
    }
}
