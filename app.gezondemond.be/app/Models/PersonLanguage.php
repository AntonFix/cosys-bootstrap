<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PersonLanguage
 *
 * @property int $id
 * @property int $person_id
 * @property int $language_id
 * @method static \Database\Factories\PersonLanguageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PersonLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonLanguage whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonLanguage wherePersonId($value)
 * @mixin \Eloquent
 */
class PersonLanguage extends Model
{
    use HasFactory;

    protected $table = 'person_languages';

    protected $fillable = [
        'person_id',
        'language_id',
    ];

    public $timestamps = false;

}
