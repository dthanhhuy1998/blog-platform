<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class InvoiceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice_status')->insert([
            ['code' => 'pending', 'name' => 'Chờ xử lý', 'color' => '#fff'],
            ['code' => 'success', 'name' => 'Hoàn thành', 'color' => '#fff'],
            ['code' => 'cancel', 'name' => 'Hủy đơn', 'color' => '#fff'],
        ]);
    }
}
