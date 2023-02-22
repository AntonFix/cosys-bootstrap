<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Search
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AppointmentCode|null $appCode
 * @property-read \App\Models\AppointmentStatus|null $appStatus
 * @property-read \App\Models\Person|null $assignedWithPerson
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $assignedWithPersonAddresses
 * @property-read int|null $assigned_with_person_addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DictionaryLanguage> $assignedWithPersonSpokenLanguages
 * @property-read int|null $assigned_with_person_spoken_languages_count
 * @property-read \App\Models\User|null $assignedWithUser
 * @property-read \App\Models\User|null $createdByUser
 * @method static \Database\Factories\SearchFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Search newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Search newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Search query()
 * @method static \Illuminate\Database\Eloquent\Builder|Search whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Search whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Search whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Search extends Model
{
    use HasFactory;

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
