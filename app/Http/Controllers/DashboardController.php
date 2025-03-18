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
    $bookedRooms = Room::where('availability', 'booked')->count();

    // Fetch tenants data with related floor and room information
    $tenants = Tenant::with(['floor', 'room'])
        ->where('date_end', '>=', now()->toDateString()) // Filter out finished tenants
        ->get();

    // Fetch available rooms with related floor information
    $availableRoomsData = Room::with('floor')
        ->where('availability', 'available')
        ->get();

    // Pass all data to the view
    return view('dashboard', compact(
        'floorsCount',
        'roomsCount',
        'availableRooms',
        'bookedRooms',
        'tenants',
        'availableRoomsData' // Add available rooms data
    ));
}
}
