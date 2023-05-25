<?php

namespace App\Http\Controllers\SpecialFeature;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialFeatureStoreRequest;
use App\Http\Requests\SpecialFeatureUpdateRequest;
use App\Repository\SpecialFeatureRepositoryInterface;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SpecialFeatureController extends Controller
{
    private $specialFeatureRepository;

    public function __construct(SpecialFeatureRepositoryInterface $specialFeatureRepository)
    {
        $this->specialFeatureRepository = $specialFeatureRepository;
        DB::connection()->enableQueryLog();
    }

    public function index()
    {
        $data = $this->specialFeatureRepository->get();

        return view('room_special_feature.index', compact([
            'data'
        ]));
    }

    public function create()
    {
        return view("room_special_feature.form");
    }

    public function store(SpecialFeatureStoreRequest $request)
    {
        try {
            $data   = $request->all();

            $result = $this->specialFeatureRepository->insert($data);
            $log    = DB::getQueryLog();
            Log::debug($log);

            if ($result["softguideStatusCode"] == ReturnMessage::OK) {
                return redirect()
                        ->route("specialFeatureCreate")
                        ->with("success_message", "Special Feature created successfully");
            } else {
                return redirect()
                        ->back()
                        ->with("error_message", "Something wrong in creating special feature");
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->specialFeatureRepository->getSpecialFeatureById($id);
            $log    = DB::getQueryLog();
            Log::debug($log);

            return view('room_special_feature.form', compact([
                'data'
            ]));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function update(SpecialFeatureUpdateRequest $request)
    {
        try {
            $data   = $request->all();
            $result = $this->specialFeatureRepository->update($data);
            $log    = DB::getQueryLog();
            Log::debug($log);

            if ($result["softguideStatusCode"] == ReturnMessage::OK) {
                return redirect()
                        ->route('specialFeatureListing')
                        ->with("success_message", "Special Feature update success");
            } else {
                return redirect()
                        ->back()
                        ->with("error_message", "Something Wrong");
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }
}
