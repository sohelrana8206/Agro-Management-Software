<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_health extends Model
{
    protected $fillable = [
        'animal_profile_id',
        'animal_health_condition_id',
        'start_date',
        'start_time',
        'note',
        'treatment',
        'animal_medicine_vaccine_id',
        'animal_physician_id',
        'animal_visit_date_time',
        'physician_comments',
        'employee_id',
        'treatment_status',
        'treatment_action_note',
        'animal_health_status',
    ];

    public function animal_profile(){
        return $this->belongsTo('App\Animal_profile','animal_profile_id');
    }

    public function animal_health_condition(){
        return $this->belongsTo('App\Animal_health_condition','animal_health_condition_id');
    }

    public function animal_medicine_vaccine(){
        return $this->belongsTo('App\Animal_medicine_vaccine','animal_medicine_vaccine_id');
    }

    public function animal_physician(){
        return $this->belongsTo('App\Animal_physician','animal_physician_id');
    }

    public function employee(){
        return $this->belongsTo('App\Employee','employee_id');
    }
}
