<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
