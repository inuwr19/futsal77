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
        Hour::create([
            'start_time'    => '14:00',
            'end_time'      => '15:00',
            'price'         => 70000,
        ]);
        Hour::create([
            'start_time'    => '15:00',
            'end_time'      => '16:00',
            'price'         => 70000,
        ]);
        Hour::create([
            'start_time'    => '16:00',
            'end_time'      => '17:00',
            'price'         => 70000,
        ]);
        Hour::create([
            'start_time'    => '17:00',
            'end_time'      => '18:00',
            'price'         => 70000,
        ]);
        Hour::create([
            'start_time'    => '18:00',
            'end_time'      => '19:00',
            'price'         => 90000,
        ]);
        Hour::create([
            'start_time'    => '19:00',
            'end_time'      => '20:00',
            'price'         => 90000,
        ]);
        Hour::create([
            'start_time'    => '20:00',
            'end_time'      => '21:00',
            'price'         => 90000,
        ]);
        Hour::create([
            'start_time'    => '21:00',
            'end_time'      => '22:00',
            'price'         => 90000,
        ]);
        Hour::create([
            'start_time'    => '22:00',
            'end_time'      => '23:00',
            'price'         => 90000,
        ]);
        Hour::create([
            'start_time'    => '23:00',
            'end_time'      => '24:00',
            'price'         => 90000,
        ]);
    }
}
