<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member')->insert([
            'id' => 1,
            'first_name' => "Adhi",
            'last_name' => "Ariyadi",
            'email' => "adhiariyadi40@gmail.com",
            'phone' => "081246835129",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
