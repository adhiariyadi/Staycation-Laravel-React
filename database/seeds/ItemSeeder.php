<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = array('Tabby Town', 'Anggana', 'Seattle Rain', 'Wodden Pit', 'Green Park', 'Podo Wae', 'Silver Rain', 'Cashville', 'PS Wood', 'One Five', 'Minimal', 'Stays Home');
        $city = array('Jakarta', 'Bogor', 'Yogyakarta', 'Wonosobo', 'Tanggerang', 'Madiun', 'Bandung', 'Kemang', 'Depok', 'Palembang', 'Ponorogo', 'Lampung');
        $no = 1;
        $catgory = 1;
        for ($i = 1; $i <= count($item); $i++) {
            if ($no == 5) {
                $catgory += 1;
                $no = 1;
            }
            $no++;
            DB::table('item')->insert([
                'id' => $i,
                'title' => $item[$i - 1],
                'price' => rand(10, 30),
                'sum_booking' => rand(2, 10),
                'city' => $city[$i - 1],
                'description' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat obcaecati aliquid, eligendi necessitatibus vero eos optio deserunt iure dolore expedita numquam ad veniam maiores, corrupti impedit harum repudiandae. Est, sit?</p>',
                'category_id' => $catgory,
                'image' => "images/item/item-" . $i . ".jpg",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
