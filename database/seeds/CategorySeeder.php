<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = array('Houses with beauty backyard', 'Hotels with large living room', 'Apartment with kitchen');
        for ($i = 0; $i < count($category); $i++) {
            DB::table('category')->insert([
                'id' => $i + 1,
                'name' => $category[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
