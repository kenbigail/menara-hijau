<?php

namespace App\Imports;

use App\Models\Room;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RoomsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Update existing room by ID
        $room = Room::find($row['id']);
        if ($room) {
            // Hanya update kolom yang ada di file
            if (isset($row['name_room'])) $room->name_room = $row['name_room'];
            if (isset($row['availability'])) $room->availability = $row['availability'];
            $room->save();
        }
        return null; // Tidak membuat data baru
    }
}
