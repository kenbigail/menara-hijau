<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Count data for dashboard metrics
        $floorsCount = Floor::count();
        $roomsCount = Room::count();
        $availableRooms = Room::where('availability', 'available')->count();
        $bookedRooms = Room::where('availability', 'unavailable')->count();

        // Fetch only 5 available rooms with related floor information
        $availableRoomsData = Room::with('floor')
            ->where('availability', 'available')
            ->take(5)
            ->get();

        // Fetch tenants that are either waiting or ongoing
        $tenants = Tenant::with(['floor', 'room'])
            ->whereIn('status', ['waiting', 'ongoing'])
            ->where('date_end', '>=', now()->toDateString())
            ->orderBy('date_start')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'floorsCount',
            'roomsCount',
            'availableRooms',
            'bookedRooms',
            'tenants',
            'availableRoomsData'
        ));
    }
}
