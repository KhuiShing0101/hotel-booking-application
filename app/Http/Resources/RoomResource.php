<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        return
        [
            'id'                        =>  $this->id,
            'name'                      =>  $this->name,
            'occupancy'                 =>  $this->occupancy,
            'size'                      =>  $this->size,
            'description'               =>  $this->description,
            'detail'                    =>  $this->detail,
            'price_per_day'             =>  $this->price_per_day,
            'extra_bed_price_per_day'   =>  $this->extra_bed_price_per_day,
            'gallery'                   =>  $this->when(
                                            $this->getRoomGalleriesByRoom() != null,
                                            $this->getRoomGalleriesByRoom
                                            ),
            'bed'                       =>  $this->when(
                                            $this->getBed() != null,
                                            BedResource::make($this->getBed
                                            )),
            'size'                      =>  $this->size,
            'description'               =>  $this->description,
            'special_features'          =>  $this->when (
                                            $this->getRoomSpecialFeatureNameByRoomId() != null,
                                            RoomSpecialFeaturesCollection::make($this->getRoomSpecialFeatureNameByRoomId)
                                            ),
        ];
    }
}
