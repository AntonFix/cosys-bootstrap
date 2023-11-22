<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $name
 * @property int|null $dictionary_geos_id
 * @property string|null $street
 * @property string|null $number
 * @property string|null $postbox
 * @property string|null $opening_times
 * @property string|null $phone_1
 * @property string|null $phone_1_notices
 * @property string|null $phone_2
 * @property string|null $phone_2_notices
 * @property string|null $phone_3
 * @property string|null $phone_3_notices
 * @property string|null $email_1
 * @property string|null $email_1_notices
 * @property string|null $email_2
 * @property string|null $email_2_notices
 * @property string|null $email_3
 * @property string|null $email_3_notices
 * @property string|null $website
 * @property string|null $fin_naam_bank
 * @property string|null $fin_naam_persoon_of_organisatie
 * @property string|null $fin_iban_code
 * @property string|null $fin_bin_code
 * @property string|null $fin_bicc_code
 * @property string|null $fin_btw_nummer
 * @property string|null $fin_ondernemingsnummer
 * @property string|null $fin_opmerkingen
 * @property int|null $is_active
 * @property int $created_by_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DictionaryGeo|null $region
 * @method static \Database\Factories\AddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereDictionaryGeosId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail1Notices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail2Notices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail3Notices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFinBiccCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFinBinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFinBtwNummer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFinIbanCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFinNaamBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFinNaamPersoonOfOrganisatie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFinOndernemingsnummer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFinOpmerkingen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereOpeningTimes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePhone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePhone1Notices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePhone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePhone2Notices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePhone3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePhone3Notices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostbox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereWebsite($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;

    public function region()
    {
        return $this->hasOne(
            DictionaryGeo::class,
            'id',
            'dictionary_geos_id'
        );
    }

    public function regionName()
    {
        return $this->hasOneThrough(
            DictionaryGeo::class,
            'id',
            'dictionary_geos_id'
        );
    }

    public function createdByUser()
    {
        return $this->hasOne(
            User::class,
            'id',
            'created_by_user_id');
    }

    public function coupledPersons()
    {
        return $this->belongsToMany(
            Person::class,
            'person_addresses',
            'address_id',
            'person_id',
            'id',
            'id'
        );
    }

}
