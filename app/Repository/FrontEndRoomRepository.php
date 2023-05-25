<?php

    namespace App\Repository;
    use App\Models\Room;
    use App\ReturnMessage;

    use App\CommonConst;
    use DB;

    class FrontEndRoomRepository implements FrontEndRoomRepositoryInterface
    {

        public function getRoomsByRandom()
        {
            $column      =
                        [
                            "id",
                            "name",
                            "type",
                            "occupancy",
                            "size",
                            DB::Raw('CONCAT( price_per_day," ","'. CommonConst::PRICE .'")AS price_per_day'),

                            "extra_bed_price_per_day",

                            DB::Raw('CONCAT("'.CommonConst::BASE_URL.'" "'. CommonConst::IMAGE_PATH .'",id,"/thumb/",thumbnail)AS thumbnail'),

                        ];

            $rooms     = Room::SELECT($column)
                        ->whereNull('deleted_at')
                        ->inRandomOrder()
                        ->limit(6)
                        ->get();

                return $rooms;
        }

        public function detail($id)
        {
            $data =
                [
                    'id',
                    'name',
                    DB::RAW('(
                        CASE
                            WHEN type = "' . CommonConst::STANDARD_ROOM_TYPE . '" THEN "Standard"
                            WHEN type = "' . CommonConst::CLUB_FLOOR_ROOM_TYPE . '" THEN "Club Floor"
                            ELSE "Suite"
                        END
                    ) AS type'),
                    DB::RAW('CONCAT(occupancy, " ", "' . CommonConst::PEOPLE . '") AS occupancy'),

                    'bed_id',

                    DB::RAW('CONCAT(size, " ", "' . CommonConst::SIZE . '") AS size'),
                    'view_id',
                    'description',
                    'detail',
                    DB::RAW('CONCAT(price_per_day, " ", "' . CommonConst::PRICE . '") AS price_per_day'),
                    DB::RAW('CONCAT(extra_bed_price_per_day, " ", "' . CommonConst::PRICE . '") AS extra_bed_price_per_day'),
                    'thumbnail',
                ];
            $room = Room::SELECT($data)
                    ->whereNull('deleted_at')
                    ->where('id',"=",$id)
                    ->first();
            return $room;
        }

        public function getAllRoom()
        {
            $column =
                [
                    "id",
                    "name",
                    "type",
                    "occupancy",
                    "size",
                    "bed_id",
                    DB::Raw('CONCAT( price_per_day," ","'. CommonConst::PRICE .'")AS price_per_day'),
                    "extra_bed_price_per_day",
                    "thumbnail"
                ];

            $rooms = Room::SELECT($column)
                ->whereNull('deleted_at')
                ->get();
        return $rooms;
        }

    }
