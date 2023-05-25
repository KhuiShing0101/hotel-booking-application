<?php

namespace App\Repository;

use App\ReturnMessage;
use App\CommonConst;

use App\Models\View;
use App\Models\Room;
use App\Models\RoomGallery;

use Auth;
use App\Utility;

use App\Repository\RoomAmenitiesRepository;
use App\Repository\RoomSpecialFeaturesRepository;

use Illuminate\Support\Facades\DB;


class RoomRepository implements RoomRepositoryInterface
{
    public function getAllRoom()
    {
        // If Single quote = String Else Table's Column
        // Constant and Varaible must be outside of the single quote
        $data = Room::SELECT(
                    'id',
                    'name',
                    DB::raw('(
                        CASE
                            WHEN type = "' . CommonConst::STANDARD_ROOM_TYPE . '" THEN "Standard"
                            WHEN type = "' . CommonConst::CLUB_FLOOR_ROOM_TYPE . '" THEN "Club Floor"
                            ELSE "Suite"
                        END
                    ) AS type'),
                    DB::raw('CONCAT(occupancy, " ", "' . CommonConst::PEOPLE . '") AS occupancy'),
                    'bed_id',
                    DB::raw('CONCAT(size, " ", "' . CommonConst::SIZE . '") AS size'),
                    'view_id',
                    'description',
                    'detail',
                    DB::raw('CONCAT(price_per_day, " ", "' . CommonConst::PRICE . '") AS price_per_day'),
                    DB::raw('CONCAT(extra_bed_price_per_day, " ", "' . CommonConst::PRICE . '") AS extra_bed_price_per_day'),
                    'thumbnail'
                )
                ->whereNull('deleted_at')
                ->paginate(CommonConst::PAGINATE_PER_PAGE);

        return $data;
    }

    public function insert(array $data)
    {
        $name                             = $data['name'];
        $type                             = $data['type'];
        $occupancy                        = $data['occupancy'];
        $bed                              = $data['bed'];
        $size                             = $data['size'];
        $view                             = $data['view'];
        $description                      = $data['description'];
        $detail                           = $data['detail'];
        $price                            = $data['room_price'];
        $extra_bed_price                  = $data['extra_bed_price'];
        $roomObj                          = new Room();
        $roomObj->name                    = $name;
        $roomObj->type                    = $type;
        $roomObj->occupancy               = $occupancy;
        $roomObj->bed_id                  = $bed;
        $roomObj->size                    = $size;
        $roomObj->view_id                 = $view;
        $roomObj->description             = $description;
        $roomObj->detail                  = $detail;
        $roomObj->price_per_day           = $price;
        $roomObj->extra_bed_price_per_day = $extra_bed_price;
        $paramObj                         = Utility::addCreate($roomObj);
        $paramObj->save();

        $insert_id                        = $paramObj->id;
        $roomSpecialFeatureRepository     = new RoomSpecialFeaturesRepository();
        $insert_room_special_feature      = $roomSpecialFeatureRepository->insert($data['special_features'], $insert_id);
        $roomAmenitiesRepository          = new RoomAmenitiesRepository();
        $insert_room_amenities            = $roomAmenitiesRepository->insert($data['amenities'], $insert_id);

        return $paramObj;
    }

    public function updateRoomGallery(array $data,$dbImage)
    {

    }

    public function getRoomGalleryByRoomId(int $id)
    {
        $gallery_data = RoomGallery::SELECT('id', 'image_name')
                            ->where('room_id', '=', $id)
                            ->whereNull('deleted_at')
                            ->get();

        return $gallery_data;
    }

    public function insertRoomGallery(int $id, $imageName)
    {
        $return                         = [];
        $roomGalleryObj                 = new RoomGallery();
        $roomGalleryObj->image_name     = $imageName;
        $roomGalleryObj->room_id        = $id;
        $paramObj                       = Utility::addCreate($roomGalleryObj);
        $paramObj->save();
        $return["softguideStatusCode"]  = ReturnMessage::OK;
        return $return;
        // return $paramObj;
    }

    public function getThumbnailByRoomId(int $id)
    {
        $thumb = Room::SELECT('thumbnail')
                ->WHERE ('id','=',$id)
                ->first();
            return $thumb;
    }

    public function thumbUpdate(int $id, $thumbName)
    {
        $return             = [];
        $roomObj            = Room::find($id);
        $roomObj->thumbnail = $thumbName;
        $paramObj           = Utility::addUpdate($roomObj);
        $paramObj->save();
        $return['softguideStatusCode']  = ReturnMessage::OK;
        return $return;
    }

    public function getRoomGalleryUpdateByRoomId(int $id)
    {
        $galleryData= RoomGallery::find($id);

        return $galleryData;
    }
}
