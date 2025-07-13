<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use App\Exports\RoomsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RoomsImport;

class FloorDashController extends Controller
{
    public function index(Request $request)
    {
        $floors = Floor::all();
        $selectedFloorId = $request->input('floor_id', $floors->first()->id);
        $rooms = Room::where('id_floor', $selectedFloorId)->get();
        $defaultFloor = Floor::find($selectedFloorId);

        return view('admin.rooms.index', compact('rooms', 'floors', 'defaultFloor'));
    }

    public function show($id)
    {
    // Fetch the room by ID
    $room = Room::findOrFail($id);

    // Fetch the floor for the room
    $floor = Floor::find($room->id_floor);

    return view('admin.rooms.detail', compact('room', 'floor'));
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $floors = Floor::all();

        return view('admin.rooms.edit', compact('room', 'floors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_room' => 'required|string|max:255',
            'id_floor' => 'required|exists:floors,id',
            'categories' => 'required|in:ballroom,office room,working space',
            'availability' => 'required|in:available,unavailable',
            'facilities' => 'nullable|string',
            'contact' => 'nullable|string',
            'size' => 'nullable|string',
            'corner' => 'nullable|in:south,north,east,west',
            'grid_col' => 'nullable|string',
            'grid_row' => 'nullable|string',
        ]);

        $room = Room::findOrFail($id);
        $facilitiesArray = $request->facilities ? explode(', ', $request->facilities) : [];

        $room->update([
            'name_room' => $request->name_room,
            'id_floor' => $request->id_floor,
            'categories' => $request->categories,
            'availability' => $request->availability,
            'facilities' => $facilitiesArray,
            'contact' => $request->contact,
            'size' => $request->size,
            'corner' => $request->corner,
            'grid_col' => $request->grid_col,
            'grid_row' => $request->grid_row,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');
    }

    public function exportAvailableRoomsPdf()
    {
        // Get all available rooms
        $availableRooms = Room::with('floor')
            ->where('availability', 'available')
            ->orderBy('id_floor')
            ->get();

        // Count available rooms by category
        $roomCounts = [
            'ballroom' => Room::where('availability', 'available')->where('categories', 'ballroom')->count(),
            'office room' => Room::where('availability', 'available')->where('categories', 'office room')->count(),
            'working space' => Room::where('availability', 'available')->where('categories', 'working space')->count(),
            'total' => Room::where('availability', 'available')->count()
        ];

        $data = [
            'title' => 'Available Rooms',
            'subtitle' => 'PT. Graha Menara Hijau',
            'date' => Carbon::now()->format('d F Y H:i:s'),
            'rooms' => $availableRooms,
            'counts' => $roomCounts
        ];

        $pdf = Pdf::loadView('admin.rooms.available-pdf', $data);
        return $pdf->download('available-rooms-'.now()->format('YmdHis').'.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new RoomsExport, 'export-rooms-'.now()->format('YmdHis').'.xlsx');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new RoomsImport, $request->file('import_file'));
            return back()->with('success', 'Rooms updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Import failed: ' . $e->getMessage());
        }
    }
}
