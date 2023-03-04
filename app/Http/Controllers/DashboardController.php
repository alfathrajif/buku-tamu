<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

    const MONTHS = [
        ["id" => 1, "name" => "Jan"],
        ["id" => 2, "name" => "Feb"],
        ["id" => 3, "name" => "Mar"],
        ["id" => 4, "name" => "Apr"],
        ["id" => 5, "name" => "May"],
        ["id" => 6, "name" => "Jun"],
        ["id" => 7, "name" => "Jul"],
        ["id" => 8, "name" => "Aug"],
        ["id" => 9, "name" => "Sep"],
        ["id" => 10, "name" => "Oct"],
        ["id" => 11, "name" => "Nov"],
        ["id" => 12, "name" => "Dec"],
    ];



    public function index()
    {

        $tamuCount = collect(self::MONTHS)->mapWithKeys(function ($name) {
            $tamus = Tamu::whereMonth('tanggal', $name['id'])->count();
            return [$name['name'] => $tamus];
        })->toArray();

        $collectionTamus = collect($tamuCount);

        $labelsTamus = $collectionTamus->keys();
        $dataTamus = $collectionTamus->values();

        $events = Event::all();

        $eventCount = collect($events)->mapWithKeys(function ($name) {
            $count = $name->tamus->count();
            return [$name['name'] => $count];
        })->toArray();

        $collectionEvent = collect($eventCount);

        $labelsEvent = $collectionEvent->keys();
        $dataEvent = $collectionEvent->values();

        return view('dashboard.index', compact('labelsTamus', 'dataTamus', 'labelsEvent', 'dataEvent'));
    }
}
