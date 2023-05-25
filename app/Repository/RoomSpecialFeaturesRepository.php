<?php

namespace App\Repository;

use App\Models\RoomSpecialFeatures;
use App\ReturnMessage;
use App\Utility;

class RoomSpecialFeaturesRepository implements RoomSpecialFeaturesRepositoryInterface
{
    public function insert(array $data, int $id)
    {
        $return = [];

        foreach ($data as $special_feature) {
            $special_feature_obj                      = new RoomSpecialFeatures();
            $special_feature_obj->room_id             = $id;
            $special_feature_obj->special_features_id = $special_feature;
            $param_obj                                = Utility::addCreate($special_feature_obj);
            $param_obj->save();
        }

        $return['softguideStatusCode'] = ReturnMessage::OK;
        return $return;
    }
}
