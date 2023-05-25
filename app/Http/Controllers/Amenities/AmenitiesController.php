<?php

namespace App\Http\Controllers\Amenities;

use App\Http\Controllers\Controller;
use App\Http\Requests\AmenitiesStoreRequest;
use App\Repository\AmenitiesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\ReturnMessage;

class AmenitiesController extends Controller
{
    private $amenitiesRepository;

    public function __construct(AmenitiesRepositoryInterface $amenitiesRepository)
    {
        $this->amenitiesRepository = $amenitiesRepository;
        DB::connection()->enableQueryLog();
    }

    public function create()
    {
        return view('room_amenities.form');
    }

    public function store(AmenitiesStoreRequest $request)
    {
        try {
            $data   = $request->all();
            $result = $this->amenitiesRepository->insert($data);
            $log    = DB::getQueryLog();
            Log::debug($log);

            if ($result["softguideStatusCode"] == ReturnMessage::OK) {
                return redirect()
                        ->route('amenitiesCreate')
                        ->with("success_message", "Amenities created successfully");
            } else {
                return redirect()
                        ->back()
                        ->with("error_message", "Something wrong in Amenities create!!!");
            }

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }
}
