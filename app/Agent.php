<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        'purchase_id',
        'agent_name',
        'agent_phone',
        'agent_address',
        'animal_owner_name',
        'animal_owner_phone',
        'animal_owner_address',
        'animal_previous_history',
    ];

    public function purchase(){
        return $this->belongsTo('App\purchase','purchase_id');
    }
}
