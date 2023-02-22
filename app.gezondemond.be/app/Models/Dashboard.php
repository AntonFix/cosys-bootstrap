<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dashboard
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DashboardFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Dashboard extends Model
{
    use HasFactory;
}
