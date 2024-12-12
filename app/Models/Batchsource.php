<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 *
 *
 * @property int $id
 * @property string|null $batch_source
 * @property string|null $batch_source_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource query()
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereBatchSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereBatchSourceDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Batchsource extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasLocks;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    public function batchmasters()
    {
        return $this->hasMany(Batchmaster::class);
    }

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
    }

    public static function boot()
    {
        parent::boot();
        $user = Auth::user();

        if ($user === null) {
            return;
        } else {

            static::creating(function ($model) {
                $user = Auth::user();
                $model->created_by = $user->username;
                $model->updated_by = $user->username;
            });
            static::updating(function ($model) {
                $user = Auth::user();
                $model->updated_by = $user->username;
            });
        }
    }
}
