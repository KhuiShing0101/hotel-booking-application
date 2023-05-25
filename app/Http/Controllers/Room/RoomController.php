<?php

namespace App\Http\Controllers\Room;

use App\CommonConst;
use App\Http\Controllers\Controller;

use App\Http\Requests\RoomImageStoreRequest;
use App\Http\Requests\RoomStoreRequest;
use App\Http\Requests\RoomImageUpdateRequest;

use App\Repository\AmenitiesRepository;

use App\Repository\BedRepositoryInterface;

use App\Repository\RoomRepositoryInterface;
use App\Repository\RoomRepository;

use App\Repository\SpecialFeatureRepositoryInterface;
use App\Repository\ViewRepositoryInterface;

use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Image;

class RoomController extends Controller
{
    private $roomRepository;
    private $viewRepository;
    private $bedRepository;
    private $specialFeatureRepository;

    public function __construct(roomRepositoryInterface $roomRepository, ViewRepositoryInterface $viewRepository, BedRepositoryInterface $bedRepository, SpecialFeatureRepositoryInterface $specialFeatureRepository)
    {
        $this->specialFeatureRepository = $specialFeatureRepository;
        $this->roomRepository           = $roomRepository;
        $this->viewRepository           = $viewRepository;
        $this->bedRepository            = $bedRepository;
        DB::connection()->enableQueryLog();
    }

    public function index()
    {
        try {
            $data = $this->roomRepository->getAllRoom();

            return view('room.index', compact([
                'data'
            ]));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function create()
    {
        try {
            $special_features  = $this->specialFeatureRepository->getAllSpecialFeature();
            $views             = $this->viewRepository->getAllView();
            $beds              = $this->bedRepository->getAllBed();
            $amenities         = new AmenitiesRepository();
            $general_amenities = $amenities->getAmenitiesByType(CommonConst::GENERAL_AMENITIES);
            $bedroom_amenities = $amenities->getAmenitiesByType(CommonConst::BEDROOM_AMENITIES);
            $others_amenities  = $amenities->getAmenitiesByType(CommonConst::OTHERS_AMENITIES);

            $log               = DB::getQueryLog();
            Log::debug($log);

            return view('room.form', compact([
                'views',
                'beds',
                'special_features',
                'general_amenities',
                'bedroom_amenities',
                'others_amenities'
            ]));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function store(RoomStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data        = $request->all();
            $insert_room = $this->roomRepository->insert($data);
            $room_id     = $insert_room->id;

            DB::commit();

            return redirect('/backend/room/image/manage/' . $room_id);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function createImage($id)
    {
        try
        {
            $room_galleries = $this->roomRepository->getRoomGalleryByRoomId($id);
            return view('room.form-image', compact([
            'id',
            'room_galleries'
            ]));
        } catch (\Exception $e)
        {
            Log::error($e->getMessage());
            abort(500);
        }

    }

    public function storeImage(RoomImageStoreRequest $request)
    {
        try
            {
                $roomId          = $request->get('room-id');
                $imageName       = pathinfo($request->file('file')->getClientOriginalName(),PATHINFO_FILENAME);
                $extension       = $request->file('file')->extension();
                $timestamp       = time();
                $rand            = rand(10,100);
                $dbImage         = $imageName . "_" . $timestamp . "_" . $rand . "." . $extension;
                $roomGalleries   = $this->roomRepository->insertRoomGallery((int) $roomId, $dbImage);

                if ( $roomGalleries["softguideStatusCode"] = ReturnMessage::OK)

                    {
                    $uploadPath     = public_path(CommonConst::IMAGE_PATH . $roomId);
                    $uploadedImg    = $uploadPath . "/" . $dbImage;

                    if(!file_exists($uploadPath))
                        {
                            mkdir($uploadPath,0777,true);
                        }

                    $request->file('file')->move($uploadPath . "/", $dbImage);

                    $isThumb = $this->roomRepository->getThumbnailByRoomId((int) $roomId);

                    if($isThumb->thumbnail == null)
                        {
                            $thumbPath      = $uploadPath . "/thumb/" ;
                            if(!file_exists($thumbPath))
                            {
                                mkdir($thumbPath,0777,true);
                            }

                            $thumbName      = "thumb_" . $dbImage;
                            $imageFile      = Image::make($uploadedImg);
                            $imageFile->resize(CommonConst::THUMB_WIDTH,CommonConst::THUMB_HEIGHT, function($constraint)
                            {
                                $constraint->aspectRatio();
                            })->save($thumbPath . $thumbName);

                            $watermark      = Image::make($thumbPath . $thumbName);
                            $watermark->insert(public_path('images/watermark.jpg'),'bottom-right', 10 ,10);
                            $watermark->save($thumbPath . $thumbName);
                            $thumbUpdate    = $this->roomRepository->thumbUpdate((int) $roomId, $thumbName);
                        }
                    }
                $log    = DB::getQueryLog();
                Log::debug($log);
                return redirect()->back()->with("success_message", "Success");
            }
        catch (\Exception $e)
            {
                Log::error($e->getMessage());
                abort(500);
            }
    }


    public function editImage($roomId,$id,$thumb)
    {
        try
        {
            $gallery_data= $this->roomRepository->getRoomGalleryByRoomId((int) $id);

            dd($gallery_data);
            $log    = DB::getQueryLog();
            Log::debug($log);

            return view('room.form-image-edit', compact([
                'roomId',
                'id',
                'thumb',
                'gallery'
            ]));
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function updateImage(RoomImageUpdateRequest $request)
    {
        try
            {
                dd($request->all());
                $imageName       = pathinfo($request->file('file')->getClientOriginalName(),PATHINFO_FILENAME);
                $extension       = $request->file('file')->extension();
                $timestamp       = time();
                $rand            = rand(10,100);
                $dbImage         = $imageName . "_" . $timestamp . "_" . $rand . "." . $extension;

                $gallery_data    = $this->roomRepository->updateRoomGallery($request->all(), $dbImage);
            }
        catch (\Exception $e)
            {
                Log::error($e->getMessage());
                abort(500);
            }



    }
}






