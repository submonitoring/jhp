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
 * @property string|null $cycle_counting
 * @property string|null $cycle_counting_desc
 * @property string|null $number_per_year
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Plant> $plants
 * @property-read int|null $plants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereCycleCounting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereCycleCountingDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereNumberPerYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Cyclecounting extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasLocks;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    public function materialplants()
    {
        return $this->hasMany(Materialplant::class);
    }

    public function plants()
    {
        return $this->belongsToMany(Plant::class);
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
