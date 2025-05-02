<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lantai = Floor::all();
        $ruang = Room::all();

        return view('lantai.index', compact('lantai', 'ruang'));
    }

    public function getRoomsByFloor($floorId)
    {
        // Ambil data ruangan berdasarkan id lantai
        $rooms = Room::where('id_floor', $floorId)
            ->select('id', 'name_room as nama_ruang', 'availability', 'grid_col', 'grid_row', 'size') // Pilih kolom yang diperlukan, termasuk availability
            ->get();
        
        // Kembalikan data ruangan dalam format JSON
        return response()->json($rooms);
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


     public function show(string $id)
     {
         // Ambil data ruangan berdasarkan ID
         $ruang = Room::find($id);
     
         // Ambil data lantai berdasarkan ID lantai dari ruangan
         $floor = Floor::find($ruang->id_floor);
     
         // Ambil data tenant yang memiliki id_floor yang sama dan id_room yang sesuai
         $tenant = Tenant::where('id_floor', $ruang->id_floor)
                          ->where('id_room', $ruang->id)
                          ->whereIn('status', ['ongoing', 'waiting'])
                          ->get();
     
         // Pastikan fasilitas dikonversi dari JSON string ke array
         $facilitiesArray = is_string($ruang->facilities) ? json_decode($ruang->facilities, true) : $ruang->facilities;
     
         // Jika data valid, gabungkan dengan pemisah "·", jika tidak, gunakan string kosong
         $formattedFacilities = $facilitiesArray ? implode(" · ", $facilitiesArray) : 'Tidak ada fasilitas';
     
         // Format tanggal untuk setiap tenant
         foreach ($tenant as $t) {
             // Formatkan date_start dan date_end dengan format yang diinginkan
             $t->formatted_date_start = Carbon::parse($t->date_start)->locale('id')->isoFormat('dddd, D MMMM YYYY');
             $t->formatted_date_end = Carbon::parse($t->date_end)->locale('id')->isoFormat('dddd, D MMMM YYYY');
         }
     
         // Kembalikan view dengan data ruangan, lantai, fasilitas, dan tenant
         return view('lantai.detail', compact('ruang', 'floor', 'formattedFacilities', 'tenant'));
     }
     
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
