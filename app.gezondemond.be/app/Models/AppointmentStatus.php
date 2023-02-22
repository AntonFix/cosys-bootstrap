<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AppointmentStatus
 *
 * @property int $id
 * @property string $title
 * @property string $details
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AppointmentStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentStatus whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentStatus whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppointmentStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AppointmentStatus extends Model
{
    use HasFactory;
}
