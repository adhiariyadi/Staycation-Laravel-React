<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name_bank', 'nomor_rekening', 'name', 'image'];

    protected $table = 'bank';
}
