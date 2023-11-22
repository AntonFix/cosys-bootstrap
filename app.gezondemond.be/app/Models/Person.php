<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Person
 *
 * @property int $id
 * @property string|null $forename
 * @property string|null $name
 * @property string|null $birthday
 * @property string|null $sex
 * @property string|null $function
 * @property int|null $volunteer
 * @property int|null $oral_coach
 * @property int|null $coordinator
 * @property string|null $details
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $presence
 * @property string|null $active_from
 * @property string|null $inactive_from
 * @property int|null $is_active
 * @property int|null $created_by_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $createdByUser
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $personAddresses
 * @property-read int|null $person_addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DictionaryLanguage> $spokenLanguages
 * @property-read int|null $spoken_languages_count
 * @method static \Database\Factories\PersonFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Person newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Person newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Person query()
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereActiveFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereCoordinator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereCreatedByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereForename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereFunction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereInactiveFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereOralCoach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person wherePresence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereVolunteer($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsToMany(
            Address::class,
            'person_addresses'
        );
    }

/*    public function personAddressesRegio()
    {
        return $this->hasOneThrough(
            Address::class, // we need info from the table 'addresses'
            PersonAddress::class, // here are relation with the table 'persons_addresses' (id, person_id, address_id)
            'person_id', // we search field 'person_id' in the table 'persons_addresses'
            'id',
            'id',
            'address_id' // match by field 'address_id' in the table 'addresses'
        );
    }*/


    public function spokenLanguages()
    {

        return $this->belongsToMany(
            DictionaryLanguage::class,
            'person_languages',
            'person_id',
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
