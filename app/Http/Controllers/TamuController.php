<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TamuController extends Controller
{

    public function create()
    {
        return view('dashboard.tamu.create');
    }

    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();
        return Redirect::back();
    }
}
