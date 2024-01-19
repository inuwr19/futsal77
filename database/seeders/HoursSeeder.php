<?php

namespace Database\Seeders;

use App\Models\Hour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hour::create([
            'start_time'    => '09:00',
            'end_time'      => '10:00',
            'price'         => 70000,
        ]);
        Hour::create([
            'start_time'    => '10:00',
            'end_time'      => '11:00',
            'price'         => 70000,
        ]);
        Hour::create([
            'start_time'    => '11:00',
            'end_time'      => '12:00',
            'price'         => 70000,
        ]);
        Hour::create([
            'start_time'    => '12:00',
            'end_time'      => '13:00',
            'price'         => 70000,
        ]);
        Hour::create([
            'start_time'    => '13:00',
            'end_time'      => '14:00',
            'price'         => 70000,
        ]);
    }
}
