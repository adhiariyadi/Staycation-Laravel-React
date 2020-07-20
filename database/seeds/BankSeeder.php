<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank')->insert([
            'id' => 1,
            'name_bank' => "Bank Central Asia",
            'nomor_rekening' => "2208 1996",
            'name' => "Adhi Ariyadi",
            'image' => "images/bank/logo bca.png",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('bank')->insert([
            'id' => 2,
            'name_bank' => "Bank Mandiri",
            'nomor_rekening' => "2206 1969",
            'name' => "Adhi Ariyadi",
            'image' => "images/bank/logo mandiri.png",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
