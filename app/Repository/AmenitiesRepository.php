<?php

namespace App\Repository;

use App\Models\Amenities;
use App\ReturnMessage;
use App\Utility;

class AmenitiesRepository implements AmenitiesRepositoryInterface
{
    public function insert($data)
    {
        $return             = [];
        $name               = $data['name'];
        $type               = $data['type'];
        $amenitiesObj       = new Amenities();
        $amenitiesObj->name = $name;
        $amenitiesObj->type = $type;
        $paramObj           = Utility::addCreate($amenitiesObj);

        $paramObj->save();
        $return['softguideStatusCode'] = ReturnMessage::OK;

        return $return;
    }

    public function getAmenitiesByType(int $type)
    {
        $data               = Amenities::SELECT('id', 'name', 'type')
                                ->where('type', '=', $type)
                                ->whereNull('deleted_at')
                                ->get();

        return $data;
    }
}
