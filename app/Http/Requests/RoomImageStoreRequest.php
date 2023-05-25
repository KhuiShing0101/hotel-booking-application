<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomImageStoreRequest extends FormRequest
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
            'file' => [
                'mimes:png,jpg,jpeg,gif',
            ]
        ];
    }

    public function messages()
    {
        return [
            'file.mimes'    => 'Only allow jpg, png jpeg and gif extension only'
        ];
    }
}
