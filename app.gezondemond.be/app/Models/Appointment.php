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

    public function assignedWithPersonAddresses()
    {
        return $this->hasManyThrough(
            Address::class, // we need info from the table 'addresses'
            PersonAddress::class, // here are relation with the table 'persons_addresses' (id, person_id, address_id)
            'person_id', // we search field 'person_id' in the table 'persons_addresses'
            'id',
            'id',
            'address_id' // match by field 'address_id' in the table 'addresses'
        );
    }

    /*public function addressRegion()
    {
        return $this->hasManyThrough(
            DictionaryGeo::class,
            PersonAddress::class,
            'person_id',
            'id',
            'id',
            'id'
        );
    }*/

    public function assignedWithPersonSpokenLanguages()
    {
        return $this->hasManyThrough(
            DictionaryLanguage::class,
            PersonLanguage::class,
            'person_id',
            'id',
            'id',
            'language_id'
        );
    }

    public function assignedWithUser()
    {
        return $this->hasOne(
            User::class,
            'id',
            'assigned_with_user_id');
    }

    public function createdByUser()
    {
        return $this->hasOne(
            User::class,
            'id',
            'created_by_user_id');
    }

}
