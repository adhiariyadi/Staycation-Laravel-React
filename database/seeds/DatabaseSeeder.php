<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(BankSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BookingSeeder::class);
    }
}
