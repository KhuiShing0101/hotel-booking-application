<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use App\Http\Requests\BedStoreRequest;
use App\Http\Requests\BedUpdateRequest;
use App\Repository\BedRepositoryInterface;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BedController extends Controller
{
    private $bedRepository;

    public function __construct(BedRepositoryInterface $bedRepository)
    {
        $this->bedRepository = $bedRepository;
        DB::connection()->enableQueryLog();
    }

    public function index()
    {
        $data = $this->bedRepository->get();

        return view('room_bed.index', compact([
            'data'
        ]));
    }

    public function create()
    {
        return view("room_bed.form");
    }

    public function store(BedStoreRequest $request)
    {
        try {
            $data   = $request->all();

            $result = $this->bedRepository->insert($data);
            $log    = DB::getQueryLog();
            Log::debug($log);

            if ($result["softguideStatusCode"] == ReturnMessage::OK) {
                return redirect()
                        ->route("bedCreate")
                        ->with("success_message", "Bed created successfully");
            } else {
                return redirect()
                        ->back()
                        ->with("error_message", "Something wrong in Bed create!!!");
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->bedRepository->getBedById($id);
            $log    = DB::getQueryLog();
            Log::debug($log);

            return view('room_bed.form', compact([
                'data'
            ]));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }

    public function update(BedUpdateRequest $request)
    {
        try {
            $data   = $request->all();
            $result = $this->bedRepository->update($data);
            $log    = DB::getQueryLog();
            Log::debug($log);

            if ($result["softguideStatusCode"] == ReturnMessage::OK) {
                return redirect()
                        ->route('bedListing')
                        ->with("success_message", "Bed update success");
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
