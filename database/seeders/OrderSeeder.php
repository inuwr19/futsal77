<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $code_order     = 'trx-'.mt_rand(1000,9999);
        $total_price    = rand(10,100).'0-000';

        Order::created([
            'user_id' => 2,
            'code_order' => $code_order,
            'total_price' => $total_price,
        ]);
    }
}
