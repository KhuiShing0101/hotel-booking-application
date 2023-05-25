<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomStoreRequest extends FormRequest
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
            'name'             => [
                'required',
                Rule::unique('room')->where(function($query) {
                    return $query
                            ->where('name', $this->name)
                            ->where('type', $this->type)
                            ->whereNull('deleted_at');
                })
            ],
            'view'             => [
                'required',
                'integer'
            ],
            'bed'              => [
                'required',
                'integer'
            ],
            'special_features' => [
                'required',
                'array'
            ],
            'type'             => [
                'required'
            ],
            'amenities'        => [
                'required',
                'array'
            ],
            'room_price'       => [
                'required',
                'integer',
                'gt:extra_bed_price'
            ],
            'extra_bed_price'  => [
                'required',
                'integer',
                'lt:room_price'
            ],
            'occupancy'        => [
                'required',
                'integer'
            ],
            'size'             => [
                'required'
            ],
            'description'      => [
                'required'
            ],
            'detail'           => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'You have to fill Room Name',
            'name.unique'               => 'Room name is already taken',
            'view.required'             => 'You have to choose Room View',
            'view.integer'              => 'View value must be Integer',
            'bed.required'              => 'You have to choose Room Bed',
            'bed.integer'               => 'Bed value must be Integer',
            'special_features.required' => 'You have to choose Special Features',
            'special_features.array'    => 'Special Features must be array',
            'type.required'             => 'You have to choose Room Type',
            'amenities.required'        => 'You have to choose Amenities',
            'amenities.array'           => 'Amenities must be array',
            'room_price.required'       => 'You have to fill Room price',
            'room_price.integer'        => 'Price value must be Integer',
            'room_price.gt'             => 'Room price must be greater than Extra Bed Price',
            'extra_bed_price.required'  => 'You have to fill Extra Bed Price',
            'extra_bed_price.lt'        => 'Extra bed price must be less than Room price',
            'extra_bed_price.integer'   => 'Extra Bed Price value must be Integer',
            'occupancy.required'        => 'You have to fill Occupancy',
            'occupancy.integer'         => 'Occupancy Value must be Integer',
            'size.required'             => 'Your have to fill Room Size', 
            'size.float'                => 'Room size value must be float',
            'description.required'      => 'You have to fill Description',
            'detail.required'           => 'You have to fill Detail'
        ];
    }
}
