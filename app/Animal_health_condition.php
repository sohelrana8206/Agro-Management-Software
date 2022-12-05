<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_health_condition extends Model
{
    protected $fillable = [
        'animal_health_condition_name',
    ];

    public function animal_health(){
        return $this->hasOne('App\Animal_health');
    }
}
