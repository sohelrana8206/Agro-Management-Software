<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hut_bazar extends Model
{
    protected $fillable = [
        'purchase_id',
        'hut_bazar_name',
        'hut_bazar_address',
        'animal_owner_name',
        'animal_owner_phone',
        'animal_previous_history',
    ];

    public function purchase(){
        return $this->belongsTo('App\purchase','purchase_id');
    }
}
