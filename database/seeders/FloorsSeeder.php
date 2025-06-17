<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('floors')->insert([
            ['id' => 1 , 'num_floor' => 'Semi Basement', 'images' => '/images/floors/ground.png'],
            ['id' => 2 , 'num_floor' => 'Basement', 'images' => '/images/floors/ground.png'],
            ['id' => 3 , 'num_floor' => 'Lantai Ground', 'images' => '/images/floors/ground.png'],
            ['id' => 4 , 'num_floor' => 'Lantai 2', 'images' => '/images/floors/2.png'],
            ['id' => 5 , 'num_floor' => 'Lantai 3', 'images' => '/images/floors/3.png'],
            ['id' => 6 , 'num_floor' => 'Lantai 4', 'images' => '/images/floors/3.png'],
            ['id' => 7 , 'num_floor' => 'Lantai 5', 'images' => '/images/floors/5.png'],
            ['id' => 8 , 'num_floor' => 'Lantai 6', 'images' => '/images/floors/6.png'],
            ['id' => 9 , 'num_floor' => 'Lantai 7', 'images' => '/images/floors/6.png'],
            ['id' => 10 , 'num_floor' => 'Lantai 8', 'images' => '/images/floors/8.png'],
            ['id' => 11 , 'num_floor' => 'Lantai 9', 'images' => '/images/floors/9.png'],
            ['id' => 12 , 'num_floor' => 'Lantai 10', 'images' => '/images/floors/10.png'],
            ['id' => 13 , 'num_floor' => 'Lantai 11', 'images' => '/images/floors/11.png'],
            ['id' => 14 , 'num_floor' => 'Lantai 12', 'images' => '/images/floors/12.png'],
            ['id' => 15 , 'num_floor' => 'Lantai 12A', 'images' => '/images/floors/12A.png'],
            ['id' => 16 , 'num_floor' => 'Lantai 14', 'images' => '/images/floors/14.png'],
        ]);

        $this->command->info('Floors seeded successfully!');
    }
}
