<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string|null $storage_location
 * @property string|null $storage_location_name
 * @property int|null $plant_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @property-read \App\Models\Plant|null $plant
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereStorageLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereStorageLocationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Storagelocation extends Model
{
    use HasFactory;

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function materialstoragelocations()
    {
        return $this->hasMany(Materialstoragelocation::class);
    }

    public function materialdocumentitems()
    {
        return $this->hasMany(Materialdocumentitem::class);
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
