<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_breed extends Model
{
    protected $fillable = [
        'breed_name',
        'breed_nationality',
        'animal_type',
    ];

    public function animal_profile(){
        return $this->hasOne('App\Animal_profile');
    }
}
