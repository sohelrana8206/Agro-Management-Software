<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class farmer extends Model
{
    protected $fillable = [
        'purchase_id',
        'farmer_name',
        'farmer_phone',
        'farmer_address',
        'animal_previous_history',
    ];

    public function purchase(){
        return $this->belongsTo('App\purchase','purchase_id');
    }
}
