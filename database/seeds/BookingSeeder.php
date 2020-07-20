<?php

use App\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $price = Item::first()->price;
        $total = $price * 2;
        DB::table('booking')->insert([
            'invoice' => 1000001,
            'start_date' => date('Y-m-d'),
            'end_date' => date('Y-m-d', strtotime('+6 days', strtotime(date('Y-m-d')))),
            'total' => $total += $total * 0.1,
            'item_id' => 1,
            'duration' => 2,
            'member_id' => 1,
            'proof_payment' => 'images/booking/buktibayar.jpeg',
            'bank_from' => 'Bank Central Asia',
            'account_holder' => 'Adhi Ariyadi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
