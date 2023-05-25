<?php

namespace App\Repository;
use App\Models\View;
use App\ReturnMessage;

class HomeRepository implements HomeRepositoryInterface
{
    public function getAllView()
    {
        $views = View::SELECT("id", "name")
                 ->whereNull("deleted_at")
                 ->get();

        return $views;
    }

    public function insert($data)
    {
        $return                  = [];
        try {
            $name                = $data['name'];
            $viewObj             = new View();
            $viewObj->name       = $name;
            $viewObj->created_at = date("Y-m-d H:i:s");
            $viewObj->created_by = 1;
            $viewObj->updated_at = date("Y-m-d H:i:s");
            $viewObj->updated_by = 1;
            $viewObj->save();
            $return["softguideStatusCode"] = ReturnMessage::OK;

            return $return;
        } catch (\Exception $e) {
            $return["softguideStatusCode"] = ReturnMessage::INTERNAL_SERVER_ERROR;
            $return["errorMessage"]        = $e->getMessage();

            return $return;
        }
    }

    public function update($data)
    {
        $id                    = $data["id"];
        $name                  = $data["name"];
        $updateObj             = View::find($id);
        $updateObj             = View::find($id);
        $updateObj->name       = $name;
        $updateObj->updated_at = date("Y-m-d H:i:s");
        $updateObj->updated_by = 1;
        $updateObj->save();

        return $updateObj;
    }

    public function delete($id)
    {
        $deleteObj             = View::find($id);
        $deleteObj->deleted_at = date("Y-m-d H:i:s");
        $deleteObj->deleted_by = 1;
        $deleteObj->save();

        return $deleteObj;
    }
}
