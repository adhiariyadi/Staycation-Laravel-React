<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name', 'qty', 'image', 'item_id'];

    protected $table = 'feature';
}
