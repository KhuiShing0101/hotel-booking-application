<?php

namespace App\Repository;

use App\CommonConst;
use App\Models\Bed;
use App\ReturnMessage;
use App\Utility;

class BedRepository implements BedRepositoryInterface
{
    public function get()
    {
        $data = Bed::SELECT('id', 'name')
                ->whereNull('deleted_at')
                ->paginate(CommonConst::PAGINATE_PER_PAGE);
                
        return $data;
    }

    public function getAllBed()
    {
        $data = Bed::SELECT('id', 'name')
                ->whereNull('deleted_at')
                ->get();
                
        return $data;
    }

    public function getBedById($id)
    {
        $data = Bed::find($id);

        return $data;
    }

    public function insert($data)
    {
        $return = [];

        $name         = $data["name"];
        $bedObj       = new Bed();
        $bedObj->name = $name;
        $paramObj     = Utility::addCreate($bedObj);
        $paramObj->save();

        $return["softguideStatusCode"] = ReturnMessage::OK;

        return $return;
    }

    public function update(array $data)
    {
        $return       = [];
        $name         = $data['name'];
        $id           = $data['id'];
        $bedObj       = Bed::find($id);
        $bedObj->name = $name;
        $paramObj     = Utility::addUpdate($bedObj);
        
        $paramObj->save();
        $return['softguideStatusCode'] = ReturnMessage::OK;

        return $return;
    }
}