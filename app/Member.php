<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];

    protected $table = 'member';
}
