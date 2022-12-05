<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_medicine_vaccine extends Model
{
    protected $fillable = [
        'animal_medicine_vaccine_name',
        'animal_type',
    ];

    public function animal_health(){
        return $this->hasOne('App\Animal_health');
    }
}
