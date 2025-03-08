<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;

class AvailablePageController extends Controller
{
    public function index()
    {
        $availableRooms = Room::where('availability', 'available')->get();
    
        return view('lantai.available_space', compact('availableRooms'));
    }
    
}
