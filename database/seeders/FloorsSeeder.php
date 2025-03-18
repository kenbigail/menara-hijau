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
            [
                'num_floor' => 'Lantai 1',
            ],
            [
                'num_floor' => 'Lantai 2',
            ],
            [
                'num_floor' => 'Lantai 3',
            ],
            [
                'num_floor' => 'Lantai 4',
            ],
            [
                'num_floor' => 'Lantai 5',
            ],
            [
                'num_floor' => 'Lantai 6',
            ],
            [
                'num_floor' => 'Lantai 7',
            ],
            [
                'num_floor' => 'Lantai 8',
            ],
            [
                'num_floor' => 'Lantai 9',
            ],
            [
                'num_floor' => 'Lantai 10',
            ],
            [
                'num_floor' => 'Lantai 11',
            ],
            [
                'num_floor' => 'Lantai 12',
            ],
            [
                'num_floor' => 'Lantai 12A',
            ],
            [
                'num_floor' => 'Lantai 14',
            ],
        ]);

        $this->command->info('Floors seeded successfully!');
    }
}
