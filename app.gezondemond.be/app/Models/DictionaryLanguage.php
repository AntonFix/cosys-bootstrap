<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DictionaryLanguage
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $local_name
 * @property string $dutch_name
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Database\Factories\DictionaryLanguageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage whereDutchName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryLanguage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DictionaryLanguage extends Model
{
    use HasFactory;
}
