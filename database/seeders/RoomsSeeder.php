<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $floorIds = DB::table('floors')->pluck('id');

        DB::table('rooms')->insert([
            'id_floor' => $floorIds[1],
            'name_room' => 'Kiani 1',
            'facilities' => json_encode(['WiFi', 'Projector', 'Air Conditioning']),
            'contact' => 'https://wa.me/6281234567890',
            'categories' => 'office room',
            'availability' => 'available',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
