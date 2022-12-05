<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_physician extends Model
{
    protected $fillable = [
        'physician_name',
        'physician_phone',
        'physician_job_type',
        'physician_organization_name',
        'physician_address',
        'physician_emergency_contact_number',
        'physician_photo',
        'physician_nid',
        'physician_nid_image',
    ];

    public function animal_born_info(){
        return $this->hasOne('App\Animal_born_info');
    }

    public function animal_health(){
        return $this->hasOne('App\Animal_health');
    }
}
