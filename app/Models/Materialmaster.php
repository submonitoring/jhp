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
 * @property int|null $numberrange_id
 * @property string|null $material_number
 * @property string|null $material_desc
 * @property string|null $old_material_number
 * @property int|null $materialtype_id
 * @property array|null $class
 * @property int|null $industrysector_id
 * @property int|null $materialgroup_id
 * @property int|null $itemcategorygroup_id
 * @property \App\Models\Uom|null $base_uom
 * @property \App\Models\Uom|null $weight_unit
 * @property string|null $gross_weight
 * @property string|null $net_weight
 * @property int|null $deletion_flag
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $is_external
 * @property-read \App\Models\Itemcategorygroup|null $genitemcategorygroup
 * @property-read \App\Models\Industrysector|null $industrysector
 * @property-read \App\Models\Materialgroup|null $materialgroup
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplant
 * @property-read int|null $materialplant_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocation
 * @property-read int|null $materialstoragelocation_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @property-read \App\Models\Materialtype|null $materialtype
 * @property-read \App\Models\Numberrange|null $numberrange
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereBaseUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereDeletionFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereGrossWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereIndustrysectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereIsExternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereItemcategorygroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereMaterialDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereMaterialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereMaterialgroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereMaterialtypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereNetWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereNumberrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereOldMaterialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereWeightUnit($value)
 * @mixin \Eloquent
 */
class Materialmaster extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasLocks;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    protected $casts = [
        'class' => 'array',
    ];

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
    }

    public function materialtype()
    {
        return $this->belongsTo(Materialtype::class);
    }

    public function industrysector()
    {
        return $this->belongsTo(Industrysector::class);
    }

    public function materialgroup()
    {
        return $this->belongsTo(Materialgroup::class);
    }

    public function genitemcategorygroup()
    {
        return $this->belongsTo(
            Itemcategorygroup::class,
            'itemcategorygroup_id'
        );
    }

    public function base_uom()
    {
        return $this->belongsTo(Uom::class, 'base_uom');
    }

    public function weight_unit()
    {
        return $this->belongsTo(Uom::class, 'weight_unit');
    }

    public function materialplant()
    {
        return $this->hasMany(Materialplant::class);
    }

    public function materialstoragelocation()
    {
        return $this->hasMany(Materialstoragelocation::class);
    }

    public function materialdocumentitems()
    {
        return $this->hasMany(Materialdocumentitem::class);
    }

    public function materialplants()
    {
        return $this->morphedByMany(Materialplant::class, 'materialmasterable');
    }

    public function materialstoragelocations()
    {
        return $this->morphedByMany(
            Materialstoragelocation::class,
            'materialmasterable'
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
