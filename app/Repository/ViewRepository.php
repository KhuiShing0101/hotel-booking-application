<?php

namespace App\Repository;

use App\CommonConst;
use App\Models\View;
use App\ReturnMessage;
use App\Utility;

use Illuminate\Support\Facades\Auth;

class ViewRepository implements ViewRepositoryInterface
{
    public function get()
    {
        $data          = View::SELECT('id', 'name')
                                ->whereNull('deleted_at')
                                ->paginate(CommonConst::PAGINATE_PER_PAGE);

        return $data;
    }

    public function getAllView()
    {
        $data          = View::SELECT('id', 'name')
                               ->whereNull('deleted_at')
                               ->get();

        return $data;
    }

    public function getViewByID(int $id)
    {
        $data          = View::find($id);

        return $data;
    }

    public function insert($data)
    {
        $return        = [];

        $name          = $data['name'];
        $viewObj       = new View();
        $viewObj->name = $name;
        $paramObj      = Utility::addCreate($viewObj);

        $paramObj->save();
        $return["softguideStatusCode"] = ReturnMessage::OK;

        return $return;
    }

    public function update(array $data)
    {
        $return        = [];
        $id            = $data['id'];
        $name          = $data['name'];
        $viewObj       = View::find($id);
        $viewObj->name = $name;
        $paramObj      = Utility::addUpdate($viewObj);

        $paramObj->save();
        $return["softguideStatusCode"] = ReturnMessage::OK;

        return $return;
    }
}
