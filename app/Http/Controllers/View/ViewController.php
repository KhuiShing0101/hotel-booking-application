<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\ViewStoreRequest;
use App\Http\Requests\ViewUpdateRequest;
use App\Models\View;
use App\Repository\ViewRepositoryInterface;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ViewController extends Controller
{
    private $viewRepository;

    public function __construct(ViewRepositoryInterface $viewRepository)
    {
        $this->viewRepository = $viewRepository;
        DB::connection()->enableQueryLog();
    }

    public function getRoomView()
    {
        $data = $this->viewRepository->get();
        $log  = DB::getQueryLog();
        Log::debug($log);

        return view('room_view.index', compact([
            'data'
        ]));
    }

    public function create()
    {
        return view('room_view.form');
    }

    public function store(ViewStoreRequest $request)
    {
        try
        {
            $data   = $request->all();

            $result = $this->viewRepository->insert($data);

            $log    = DB::getQueryLog();
            Log::debug($log);
            if ($result["softguideStatusCode"] == ReturnMessage::OK) {
                return redirect()
                        ->route('viewListing')
                        ->with("success_message", "Success");
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

    public function edit($id)
    {
       try {
            $data = $this->viewRepository->getViewByID($id);
            $log    = DB::getQueryLog();
            Log::debug($log);

            return view('room_view.form', compact([
                'data'
            ]));
       } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
       }
    }

    public function update(ViewUpdateRequest $request)
    {
        try
        {
            $data   = $request->all();

            $result = $this->viewRepository->update($data);

            $log    = DB::getQueryLog();
            Log::debug($log);

            if ($result["softguideStatusCode"] == ReturnMessage::OK) {
                return redirect()
                        ->route('viewListing')
                        ->with("success_message", "View update success");
            } else {
                return redirect()
                        ->back()
                        ->with("error_message", "Something Wrong");
            }

        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            abort(500);
        }
    }
}
