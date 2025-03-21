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
            ->take(5) // Limit to 5 records
            ->get();

        // Fetch only 5 tenants with related floor and room information
        $tenants = Tenant::with(['floor', 'room'])
            ->where('date_end', '>=', now()->toDateString()) // Filter out finished tenants
            ->take(5) // Limit to 5 records
            ->get();

        // Pass all data to the view
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
