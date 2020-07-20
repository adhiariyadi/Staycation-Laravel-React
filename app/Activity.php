<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['name', 'type', 'image', 'item_id'];

    protected $table = 'activity';
}
