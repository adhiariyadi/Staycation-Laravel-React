<?php

use App\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activity = array('Green Lake', 'Dog Clubs', 'Labour and Wait', 'Snorkeling');
        $type = array('Nature', 'Pool', 'Shopping', 'Beach');
        $item = Item::count();
        $no = 1;
        $id = 1;
        for ($i = 0; $i < count($activity) * $item; $i++) {
            if ($no == 5) {
                $no = 1;
                $id += 1;
            }
            DB::table('activity')->insert([
                'id' => $i + 1,
                'name' => $activity[$no - 1],
                'type' => $type[$no - 1],
                'image' => "images/activity/activity-" . $no++ . ".png",
                'item_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
