<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Appointment
 *
 * @property int $id
 * @property string $title
 * @property string|null $details
 * @property int|null $app_code_id
 * @property int|null $app_status_id
 * @property int|null $created_by_user_id
 * @property int|null $assigned_with_user_id
 * @property int|null $assigned_with_person_id
 * @property string|null $start_date
 * @property string|null $start_time
 * @property string|null $end_date
 * @property string|null $end_time
 * @property string|null $attachment
 * @property int|null $archived
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
 * @method static \Database\Factories\AppointmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereAppCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereAppStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereArchived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereAssignedWithPersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereAssignedWithUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCreatedByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    public function assignedWithPersonAddresses()
    {
        return $this->hasManyThrough(
            Address::class,
            PersonAddress::class,
            'person_id',
            'id',
            'assigned_with_person_id',
            'address_id'
        );
    }

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

    public function assignedWithPersonSpokenLanguages()
    {
        return $this->hasManyThrough(
            DictionaryLanguage::class,
            PersonLanguage::class,
            'person_id',
            'id',
            'assigned_with_person_id',
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
