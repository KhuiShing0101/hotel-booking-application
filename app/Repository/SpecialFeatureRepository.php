<?php

namespace App\Repository;

use App\CommonConst;
use App\Models\SpeicalFeatures;
use App\ReturnMessage;
use App\Utility;

class SpecialFeatureRepository implements SpecialFeatureRepositoryInterface
{
    public function get()
    {
        $data = SpeicalFeatures::SELECT('id', 'name')
                ->whereNull('deleted_at')
                ->paginate(CommonConst::PAGINATE_PER_PAGE);

        return $data;
    }

    public function getAllSpecialFeature()
    {
        $data = SpeicalFeatures::SELECT('id', 'name')
                ->whereNull('deleted_at')
                ->get();

        return $data;
    }

    public function getSpecialFeatureById(int $id)
    {
        $data = SpeicalFeatures::find($id);

        return $data;
    }

    public function insert($data)
    {
        $return = [];

        $name                    = $data["name"];
        $specialFeatureObj       = new SpeicalFeatures();
        $specialFeatureObj->name = $name;
        $paramObj                = Utility::addCreate($specialFeatureObj);
        $paramObj->save();

        $return["softguideStatusCode"] = ReturnMessage::OK;

        return $return;
    }

    public function update(array $data)
    {
        $return                  = [];
        $name                    = $data['name'];
        $id                      = $data['id'];
        $specialFeatureObj       = SpeicalFeatures::find($id);
        $specialFeatureObj->name = $name;
        $paramObj                = Utility::addUpdate($specialFeatureObj);

        $paramObj->save();
        $return["softguideStatusCode"] = ReturnMessage::OK;

        return $return;
    }
}
