<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons'; //select exact table "persons"

    protected $fillable = [
        'forename',
        'name',
        'birthday',
        'sex',
        'function',
        'volunteer',
        'oral_coach',
        'coordinator',
        'details',
        'phone',
        'email',
        'presence',
        'active_from',
        'inactive_from',
        'is_active',
        'created_by_user_id',
    ];

    public function personAddresses()
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

    public function spokenLanguages()
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

    public function createdByUser()
    {
        return $this->hasOne(
            User::class,
            'id',
            'created_by_user_id'
        );
    }

}
