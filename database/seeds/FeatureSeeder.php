<?php

use App\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feature = array('bedroom', 'living room', 'bathroom', 'dining rooms', 'mbp/s', 'unit ready', 'refigrator', 'televion');
        $item = Item::count();
        $no = 1;
        $id = 1;
        for ($i = 0; $i < count($feature) * $item; $i++) {
            if ($no == 9) {
                $no = 1;
                $id += 1;
            } else {
                $no = $no;
            }
            DB::table('feature')->insert([
                'id' => $i + 1,
                'name' => $feature[$no - 1],
                'qty' => rand(1, 10),
                'image' => "images/feature/feature-" . $no++ . ".png",
                'item_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
