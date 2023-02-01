<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
