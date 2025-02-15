<?php

namespace App\Http\Controllers;

use App\Models\Floors;
use App\Models\Rooms;
use Illuminate\Http\Request;

class FloorDashController extends Controller
{
    public function index()
    {
        $rooms = Rooms::with('floor')->get();
        $floors = Floors::all();
        $defaultFloor = $floors->first(); // Get the first floor as default

        return view('admin.rooms.index', compact('rooms', 'floors', 'defaultFloor'));
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
    }
}
