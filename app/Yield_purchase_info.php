<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yield_purchase_info extends Model
{
    protected $fillable = [
        'yield_info_id',
        'previous_yield_owner_name',
        'previous_yield_owner_address',
        'yield_purchase_date',
        'yield_purchase_cost',
    ];

    public function yield_info(){
        return $this->belongsTo('App\Yield_info','yield_info_id');
    }
}
