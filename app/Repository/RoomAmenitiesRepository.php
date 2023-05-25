<?php

namespace App\Repository;

use App\Models\RoomAmenities;
use App\ReturnMessage;
use App\Utility;

class RoomAmenitiesRepository implements RoomAmenitiesRepositoryInterface
{
    public function insert(array $data, int $id)
    {
        $return = [];

        foreach ($data as $amenity) {
            $amenity_obj               = new RoomAmenities();
            $amenity_obj->room_id      = $id;
            $amenity_obj->amenities_id = $amenity;
            $param_obj                 = Utility::addCreate($amenity_obj);
            $param_obj->save();
        }

        $return['softguideStatusCode'] = ReturnMessage::OK;
        return $return;
    }
}