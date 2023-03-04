<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('index', [
            'events' => $events
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'event_id' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required'
        ]);

        $tamu = Tamu::create($validated);

        if ($tamu) {
            Session::flash('status');
            Session::flash('message', 'Tamu berhasil ditambahkan');
        }

        return redirect()->back();
    }
}
