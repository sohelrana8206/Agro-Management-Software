<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'image',
        'designation',
        'mobile',
        'address',
        'employment_type',
        'create_user',
    ];

    public function animal_feeding(){
        return $this->hasOne('App\Animal_feeding');
    }

    public function animal_health(){
        return $this->hasOne('App\Animal_health');
    }

    public function transactions($employeeID)
    {
        $employees = DB::table('transactions')
            ->join('employees','transactions.transactionable_id' , '=','employees.id','LEFT')
            ->where('transactions.transactionable_id', $employeeID)
            ->where('transactions.transactionable_type', 'Employee')
            ->orderBy('transactions.id', 'desc')
            ->select('transactions.*','employees.*')
            ->get();

        return $employees;
    }
}
