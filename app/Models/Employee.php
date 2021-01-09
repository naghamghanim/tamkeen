<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table="employee";
    protected $fillable=[
        'firstname',
        'lastname',
        'phone',
        'email',
        'gender',
        'empNo',
        'department_id',
        'city_id',
        'active',
        'image',
        

    ];

    public function department()
    {
        return $this->belongsTo(Department::class);

    }
    
    public function city()
    {
        return $this->belongsTo(City::class);
        
    }
}
