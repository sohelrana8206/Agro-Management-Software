<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yield_rent_info extends Model
{
    protected $fillable = [
        'yield_info_id',
        'yield_owner_name',
        'yield_owner_phone',
        'yield_owner_address',
        'yield_rent_start_date',
        'yield_rent_end_date',
        'yield_rent_cost',
    ];

    public function yield_info(){
        return $this->belongsTo('App\Yield_info','yield_info_id');
    }
}
