<?php

namespace App\Http\Controllers;

use App\Models\Floors;
use App\Models\Rooms;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $floorsCount = Floors::count();
        $roomsCount = Rooms::count();
        $availableRooms = Rooms::where('availability', 'available')->count();
        $bookedRooms = Rooms::where('availability', 'booked')->count();

        return view('dashboard', compact('floorsCount', 'roomsCount', 'availableRooms', 'bookedRooms'));
    }
}
