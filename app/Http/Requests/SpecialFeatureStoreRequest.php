<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpecialFeatureStoreRequest extends FormRequest
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
                Rule::unique('special_features')->where(function($query) {
                    return $query
                            ->where("name", $this->name)
                            ->where("deleted_at", null);
                })
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You have to fill Room Special Feature Name!',
            'name.unique'   => 'Special feature name already taken!'
        ];
    }
}
