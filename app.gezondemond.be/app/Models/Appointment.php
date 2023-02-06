<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'app_code_id',
        'app_status_id',
        'created_by_user_id',
        'assigned_with_user_id',
        'assigned_with_person_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'attachment',
        'archived',
    ];

    public function appCode()
    {
        return $this->hasOne(
            AppointmentCode::class,
            'id',
            'app_code_id');
    }

    public function appStatus()
    {
        return $this->hasOne(
            AppointmentStatus::class,
            'id',
            'app_status_id');
    }

    public function assignedWithPerson()
    {
        return $this->hasOne(
            Person::class,
            'id',
            'assigned_with_person_id');
    }

}
