<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Debug
 *
 * @property int $id
 * @property string $nameString
 * @property string $nameChar
 * @property int|null $integer
 * @property string|null $decimal
 * @property int|null $boolean
 * @property float|null $float
 * @property float|null $double
 * @property string|null $dateTime
 * @property string|null $date
 * @property string|null $enum
 * @property string|null $uuidColumn
 * @property string|null $year
 * @property mixed|null $json
 * @property int|null $foreignId
 * @property string|null $uploadedFile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DebugFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Debug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Debug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Debug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereBoolean($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereDateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereDecimal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereDouble($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereEnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereFloat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereForeignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereInteger($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereNameChar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereNameString($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereUploadedFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereUuidColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debug whereYear($value)
 * @mixin \Eloquent
 */
class Debug extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameString',
        'nameChar',
        'integer',
        'decimal',
        'float',
        'double',
        'dateTime',
        'date',
        'enum',
        'uuidColumn',
        'year',
        'json',
        'foreignId',
        'uploadedFile'
    ];

}
