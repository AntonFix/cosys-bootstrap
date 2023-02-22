<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PersonAddress
 *
 * @property int $id
 * @property int $person_id
 * @property int $address_id
 * @method static \Database\Factories\PersonAddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PersonAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonAddress whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonAddress wherePersonId($value)
 * @mixin \Eloquent
 */
class PersonAddress extends Model
{
    use HasFactory;

    protected $table = 'person_addresses';

    protected $fillable = [
        'person_id',
        'address_id',
    ];

    public $timestamps = false;

}
