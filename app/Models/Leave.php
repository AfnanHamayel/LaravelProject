<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable =[
        'description','date','id','status','employee_id','leave_type_id'
    ];

    public function Employee()
    {
        return $this->hasOne(Employee::class,'id','employee_id');
    }
    
    public function LeaveType()
    {
        return $this->hasOne(LeaveType::class,'id','leave_type_id');
    }
    
}
