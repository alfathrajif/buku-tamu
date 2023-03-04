<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::orderByDesc('id')->paginate(10);
        return view('dashboard.tamu.index', [
            'events' => $events,
        ]);
    }

    public function show($id)
    {


        $event = Event::with(['tamus'])->findOrFail($id);
        $tamus = Tamu::where('event_id', $id)->filter(request(['search']))->paginate(5);

        return view('dashboard.tamu.event-detail', [
            'event' => $event,
            'tamus' => $tamus
        ]);
    }

    public function create()
    {
        return view('dashboard.tamu.create', []);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'pic' => 'required',
            'tanggal' => 'required',
        ]);

        Event::create($validated);

        return redirect('/dashboard/event');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->tamus->count()) {
            Session::flash('status');
            Session::flash('event_name', $event->name);

            return redirect('/dashboard/event/destroy-info/' . $event->id);
        }
        $event->delete();
        return redirect('/dashboard/event');
    }

    public function destroyInfo($id)
    {
        $event = Event::findOrFail($id);
        if ($event->tamus->count()) {
            return view('dashboard.tamu.delete-info', [
                'event' => $event
            ]);
        }
        return redirect('/dashboard/event');
    }
}
