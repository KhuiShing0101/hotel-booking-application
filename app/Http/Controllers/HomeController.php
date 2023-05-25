<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\View;
use App\Repository\HomeRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use App\ReturnMessage;

class HomeController extends Controller
{
    private $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function index ()
    {
        return view("home.home");
    }

    public function test ()
    {
        // $data = View::all();
        // $data = View::SELECT("id", "name")->get();
        // $id   = 1;
        // $data = View::find($id);
        // $raw_data = DB::select("select * from `view`");
        // dd($raw_data);
        // dd($data->name);
        // dd($data);
        $rooms     = Room::SELECT("room.id", "room.name", "room.occupancy", "view.name as view_name")
                     ->LEFTJOIN("view", "room.view_id", "view.id")
                     ->whereNull("room.deleted_at")
                     ->get();

        $view_data = View::SELECT("id", "name")
                     ->whereNull("deleted_at")
                     ->get();
        return view('test', compact([
            'view_data',
            'rooms'
        ]));
    }

    public function getView ()
    {
            $views = $this->homeRepository->getAllView();
            return view("view.index", compact([
                "views",
            ]));

    }

    public function editView ($id)
    {

            $view = View::find($id);
            return view("view.edit", compact([
                "view"
            ]));
         abort(500);

    }

    public function update (Request $request)
    {

            $data   = $request->all();
            $result = $this->homeRepository->update($data);

            return redirect()->route("viewListing");

    }

    public function deleteView ($id)
    {

            $result = $this->homeRepository->delete((int) $id);

            return redirect()->route("viewListing");

    }

    public function createView ()
    {
        return view("view.create");
    }

    public function store (StoreRequest $request)
    {
        try {
            $data                          = $request->all();
            $result                        = $this->homeRepository->insert($data);

            if ($result["softguideStatusCode"] == ReturnMessage::OK) {
                return redirect()->route("viewListing");
            } else {
                return redirect()->route("viewCreate")->with("error_message", $result["errorMessage"]);
            }
        } catch(\Exception $e) {
            abort(500);
        }
    }

    public function testApi()
    {
        dd('im api');
    }
}
