<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\Floor;
use Illuminate\Support\Facades\File;

class RoomsSeeder extends Seeder
{
    public function run()
    {
        // Baca file JSON
        $json = File::get(database_path('json/rooms.json'));
        $data = json_decode($json, true);

        // Periksa apakah data memiliki key yang benar
        if (isset($data[2]['data']) && is_array($data[2]['data'])) {
            foreach ($data[2]['data'] as $room) {

                // Pastikan id_floor ada di tabel floors agar tidak error foreign key
                if (!Floor::where('id', $room['id_floor'])->exists()) {
                    continue; // Lewati jika id_floor tidak valid
                }

                Room::create([
                    'id_floor'     => $room['id_floor'],
                    'name_room'    => $room['name_room'],
                    'images'       => $room['images'],
                    'facilities'   => json_decode($room['facilities'], true),
                    'contact'      => $room['contact'],
                    'size'         => $room['size'],
                    'categories'   => $room['categories'],
                    'corner'       => $room['corner'],
                    'availability' => $room['availability'],
                    'grid_col'     => $room['grid_col'],
                    'grid_row'     => $room['grid_row'],
                    'created_at'   => $room['created_at'],
                    'updated_at'   => $room['updated_at'],
                ]);
            }
        }
    }
}
