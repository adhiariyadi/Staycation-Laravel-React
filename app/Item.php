<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title', 'price', 'sum_booking', 'city', 'popular', 'description', 'category_id', 'image'];

    public function feature($id)
    {
        return Feature::where('item_id', $id)->get();
    }

    public function activity($id)
    {
        return Activity::where('item_id', $id)->get();
    }

    protected $table = 'item';
}
