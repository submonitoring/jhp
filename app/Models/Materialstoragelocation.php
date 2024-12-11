<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $materialmaster_id
 * @property int|null $plant_id
 * @property int|null $storagelocation_id
 * @property int|null $storagecondition_id
 * @property int|null $temperaturecondition_id
 * @property string|null $slug
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Materialmaster|null $materialmaster
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @property-read \App\Models\Plant|null $plant
 * @property-read \App\Models\Storagecondition|null $storagecondition
 * @property-read \App\Models\Storagelocation|null $storagelocation
 * @property-read \App\Models\Temperaturecondition|null $temperaturecondition
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereMaterialmasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereStorageconditionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereStoragelocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereTemperatureconditionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Materialstoragelocation extends Model
{
    use HasFactory;

    public function materialmaster()
    {
        return $this->belongsTo(Materialmaster::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function storagelocation()
    {
        return $this->belongsTo(Storagelocation::class);
    }

    public function storagecondition()
    {
        return $this->belongsTo(Storagecondition::class);
    }

    public function temperaturecondition()
    {
        return $this->belongsTo(Temperaturecondition::class);
    }

    public function materialplants()
    {
        return $this->morphToMany(Materialplant::class, 'materialplantable');
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
