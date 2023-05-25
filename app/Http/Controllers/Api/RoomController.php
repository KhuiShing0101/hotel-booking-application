<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Repository\FrontEndRoomRepositoryInterface;

use Illuminate\Support\Facades\Log;
use DB;

use App\Models\Room;
use App\Models\RoomSpecialFeatures;

use App\Http\Resources\RoomResource;
use App\Http\Resources\RoomCollection;

use App\Http\Resources\RoomSpecialFeaturesResource;
use App\Http\Resources\RoomSpecialFeaturesCollection;

class RoomController extends Controller
{

        private $roomRepository;

        public function __construct(FrontEndRoomRepositoryInterface $roomRepository)
        {
            $this->FrontEndRoomRepositoryInterface = $roomRepository;
            DB::connection()->enableQueryLog();
        }

        public function testApi(Request $request): JsonResponse
        {
            try
                {
                    dd($request->header('api-token'));

                    $rooms  =   $this->FrontEndRoomRepositoryInterface->getRoomsByRandom();


                    $logs   =   DB::getQuerylog();
                    Log::debug($logs);

                    // $thumbnail = DB::raw('CONCAT("' . CommonConst::BASE_URL . ' ", "' . CommonConst::IMAGE_PATH . '", id, "/thumb/", thumbnail) AS thumbnail');
                    // $results = DB::table('Room')
                    //         ->select($thumbnail)
                    //         ->get();
                    //     foreach ($results as $result) {
                    //         $result->thumbnail = base64_encode($result->thumbnail);
                    //     }

                    return new JsonResponse ($rooms);


                }

            catch (\Exception $e)
                {
                    Log::error($e->getMessage());
                    abort(500);
                }
        }

        public function apiDetail(Request $request): RoomResource
        {
        //     $id     = $request->get('id');
        //     $rooms  = $this->FrontEndRoomRepositoryInterface->detail((int)$id);
        //     dd($rooms);
            try
                {
                    // dd($request->header('api-token'));
                    $id     = $request->get('id');
                    $rooms  =   $this->FrontEndRoomRepositoryInterface->detail((int) $id);
                    // dd($rooms);

                    $logs   =   DB::getQuerylog();
                    Log::debug($logs);

                    return new RoomResource ($rooms);

                }
            catch (\Exception $e)
                {
                    Log::error($e->getMessage());
                    abort(500);
                }
        }

        public function apiRoom(Request $request): RoomCollection
        {

            try
                {
                    $rooms     = $this->FrontEndRoomRepositoryInterface->getAllRoom();

                    // dd($rooms);

                    $logs   =   DB::getQuerylog();
                    Log::debug($logs);
                    return new RoomCollection ($rooms);

                }
            catch (\Exception $e)
                {
                    Log::error($e->getMessage());
                    abort(500);
                }
        }
        public function apiRoomSpecialFeature(Request $request):RoomSpecialFeaturesCollection
        {
            try
                {
                    $room_special_feature=RoomSpecialFeatures::whereNull('deleted_at')->get();
                    return new RoomSpecialFeaturesCollection($room_special_feature);

                }

            catch (\Exception $e)
                {
                    Log::error($e->getMessage());
                    abort(500);
                }
        }

        public function apiRoomSpecialFeatureByName(Request $request):RoomSpecialFeaturesResource
        {
            try
                {
                    $id = $request->get('id');
                    $room_special_feature=RoomSpecialFeatures::find($id);
                    return new RoomSpecialFeaturesResource($room_special_feature);

                }

            catch (\Exception $e)
                {
                    Log::error($e->getMessage());
                    abort(500);
                }
        }

        // public function apiRoom(Request $request): RoomCollection
        // {
        // //     $id     = $request->get('id');
        // //     $rooms  = $this->FrontEndRoomRepositoryInterface->detail((int)$id);
        // //     dd($rooms);
        //     $rooms     = $this->FrontEndRoomRepositoryInterface->getAllRoom();
        //     dd($rooms);
        // }


}


