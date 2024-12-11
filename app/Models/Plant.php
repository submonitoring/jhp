<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string|null $plant
 * @property string|null $plant_name
 * @property int|null $companycode_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \App\Models\Companycode|null $companycode
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cyclecounting> $cyclecountings
 * @property-read int|null $cyclecountings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Storagelocation> $storagelocations
 * @property-read int|null $storagelocations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereCompanycodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant wherePlant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant wherePlantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Plant extends Model
{
    use HasFactory;

    public function companycode()
    {
        return $this->belongsTo(Companycode::class);
    }

    public function storagelocations()
    {
        return $this->hasMany(Storagelocation::class);
    }

    public function materialplants()
    {
        return $this->hasMany(Materialplant::class);
    }

    public function materialstoragelocations()
    {
        return $this->hasMany(Materialstoragelocation::class);
    }

    public function materialdocumentitems()
    {
        return $this->hasMany(Materialdocumentitem::class);
    }

    public function cyclecountings()
    {
        return $this->belongsToMany(Cyclecounting::class);
    }

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'addressable');
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
