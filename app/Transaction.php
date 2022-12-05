<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'account_head_id',
        'dr_cr',
        'amount',
        'narration',
        'transaction_date',
        'create_user',
        'created_at',
    ];

    public function account_head(){
        return $this->belongsTo('App\Account_head','account_head_id');
    }
}
