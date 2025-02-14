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
        DB::table('rooms')->insert([
            [
                'id_floor' => 1, // Manually choose the floor ID
                'name_room' => 'Kiani 1',
                'images' => json_encode([]),
                'facilities' => json_encode(['WiFi', 'Projector', 'Air Conditioning']),
                'contact' => 'https://wa.me/6281234567890',
                'categories' => 'office room',
                'availability' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_floor' => 2, // Manually choose the floor ID
                'name_room' => 'Kiani 2',
                'images' => json_encode([]),
                'facilities' => json_encode(['WiFi', 'Projector', 'Air Conditioning']),
                'contact' => 'https://wa.me/6281234567890',
                'categories' => 'ballroom',
                'availability' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_floor' => 3, // Manually choose the floor ID
                'name_room' => 'Kiani 3',
                'images' => json_encode([]),
                'facilities' => json_encode(['WiFi', 'Projector', 'Air Conditioning']),
                'contact' => 'https://wa.me/6281234567890',
                'categories' => 'working space',
                'availability' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $this->command->info('Rooms have been seeded with manually assigned floor IDs!');
    }
}
