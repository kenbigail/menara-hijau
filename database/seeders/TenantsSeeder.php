<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('tenants')->insert([
            [
                'id_floor' => 1, // Manually choose the floor ID
                'id_room' => 1, // Manually choose the rooms ID
                'name_tenant' => 'DigiTeam',
                'email' => 'digiteam@gmail.com',
                'phone' => '081234567890',
                'date_start' => date_create('2024-01-16'),
                'date_end' => date_create('2025-02-20'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $this->command->info('Tenants have been seeded with manually assigned floor & room IDs!');
    }
}
