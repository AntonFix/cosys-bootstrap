<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AppointmentCode
 *
 * @property int $id
 * @property string $title
 * @property string $details
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AppointmentCodeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentCode whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentCode whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentCode whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AppointmentCode extends Model
{
    use HasFactory;
}
