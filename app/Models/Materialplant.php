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
 * @property int|null $materialmaster_id
 * @property int|null $plant_id
 * @property int|null $loadinggroup_id
 * @property int|null $transportationgroup_id
 * @property int|null $periodindicator_id
 * @property int|null $procurementtype_id
 * @property int|null $specialprocurementtype_id
 * @property string|null $safety_stock
 * @property string|null $minimal_safety_stock
 * @property string|null $slug
 * @property int|null $is_batch
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cyclecounting|null $cyclecounting
 * @property-read \App\Models\Loadinggroup|null $loadinggroup
 * @property-read \App\Models\Materialmaster|null $materialmaster
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @property-read \App\Models\Periodindicator|null $periodindicator
 * @property-read \App\Models\Plant|null $plant
 * @property-read \App\Models\Procurementtype|null $procurementtype
 * @property-read \App\Models\Specialprocurementtype|null $specialprocurementtype
 * @property-read \App\Models\Transportationgroup|null $transportationgroup
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereIsBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereLoadinggroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereMaterialmasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereMinimalSafetyStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant wherePeriodindicatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereProcurementtypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereSafetyStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereSpecialprocurementtypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereTransportationgroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Materialplant extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasLocks;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    public function cyclecounting()
    {
        return $this->belongsTo(Cyclecounting::class);
    }

    public function loadinggroup()
    {
        return $this->belongsTo(Loadinggroup::class);
    }

    public function periodindicator()
    {
        return $this->belongsTo(Periodindicator::class);
    }

    public function procurementtype()
    {
        return $this->belongsTo(Procurementtype::class);
    }

    public function transportationgroup()
    {
        return $this->belongsTo(Transportationgroup::class);
    }

    public function specialprocurementtype()
    {
        return $this->belongsTo(Specialprocurementtype::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function materialmaster()
    {
        return $this->belongsTo(Materialmaster::class);
    }

    public function materialmasters()
    {
        return $this->morphToMany(Materialmaster::class, 'materialmasterable');
    }

    public function materialstoragelocations()
    {
        return $this->morphedByMany(
            Materialstoragelocation::class,
            'materialplantable'
        );
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
