<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Keenan Abigail',
                'email' => 'ken@menara.com',
                'password' => Hash::make('12345678'),
                'desc' => 'Bagus Mancab Keren',
                'avatar' => 'avatar.png',
                'role' => 'superAdmin',
            ],
        ]);

        $this->command->info('Users seeded successfully!');
    }
}
