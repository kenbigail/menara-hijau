<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $floorsCount = Floor::count();
        $roomsCount = Room::count();
        $availableRooms = Room::where('availability', 'available')->count();
        $bookedRooms = Room::where('availability', 'booked')->count();

        return view('dashboard', compact('floorsCount', 'roomsCount', 'availableRooms', 'bookedRooms'));
    }
}
