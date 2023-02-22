<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DictionaryGeo
 *
 * @property int $id
 * @property string $postcode
 * @property string $gemeente
 * @property string $deelgemeente
 * @property string $provincie
 * @property string $vertaling
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DictionaryGeoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo query()
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo whereDeelgemeente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo whereGemeente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo whereProvincie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryGeo whereVertaling($value)
 * @mixin \Eloquent
 */
class DictionaryGeo extends Model
{
    use HasFactory;
}
