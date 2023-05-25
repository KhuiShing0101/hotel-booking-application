<?php

namespace App\Http\Controllers\Home;

use App\helper;
use App\Http\Controllers\Controller;
use App\Repository\FrontEndRoomRepositoryInterface;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller

{
    private $frontEndRoomRepository;

    public function __construct(FrontEndRoomRepositoryInterface $frontEndRoomRepository)
    {
        $this->frontEndRoomRepositoryInterface = $frontEndRoomRepository;
        DB::connection()->enableQueryLog();
    }
    public function index()
    {

        try
        {
            $rooms      = $this->frontEndRoomRepositoryInterface->getRoomsByRandom();

            $log        = DB::getQueryLog();
            Log::debug($log);

            return view('frontend.frontend_home',compact
            (
                ['rooms']
            ));
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            abort(500);
        }

    }

    public function getRoom()
    {
        return view('frontend.frontend_room');
    }

    public function about()
    {
        return view('frontend.frontend_about');
    }


    public function getAllRoom()
    {

        try
            {
                $rooms= $this->frontEndRoomRepositoryInterface->getAllRoom();
                if(!$rooms)
                    {
                    abort(404);
                    }

                $log = DB::getQueryLog();
                Log::debug($log);

                return view('frontend.frontend_room',compact(['rooms']));
            }

        catch (\Exception $e)
            {
                Log::error($e->getMessage());
                abort(500);
            }
    }

    public function detail($id)
    {

        // try
        //     {
                $rooms= $this->frontEndRoomRepositoryInterface->detail((int) $id);
                // if(!$rooms)
                //     {
                //     abort(404);
                //     }

                $log = DB::getQueryLog();
                Log::debug($log);

                return view('frontend.room_detail',compact(['rooms']));
            // }

        // catch (\Exception $e)
        //     {
        //         Log::error($e->getMessage());
        //         abort(500);
        //     }
    }
}
