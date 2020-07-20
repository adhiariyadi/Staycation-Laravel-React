<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['start_date', 'end_date', 'invoice', 'item_id', 'duration', 'total', 'member_id', 'proof_payment', 'bank_from', 'status', 'account_holder'];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    protected $table = 'booking';
}
