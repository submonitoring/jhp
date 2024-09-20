<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int|null $nrobject_id
 * @property string|null $nr_interval
 * @property string|null $con
 * @property string|null $year
 * @property string|null $number
 * @property string|null $current_number
 * @property int|null $is_external
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Nrobject|null $nrobject
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange query()
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereCon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereCurrentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereIsExternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereNrInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereNrobjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereYear($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialtype> $materialtypes
 * @property-read int|null $materialtypes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Documenttype> $documenttypes
 * @property-read int|null $documenttypes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @mixin \Eloquent
 */
class Numberrange extends Model
{
    use HasFactory;

    public function nrobject()
    {
        return $this->belongsTo(Nrobject::class);
    }

    public function materialtypes()
    {
        return $this->hasMany(Materialtype::class);
    }

    public function documenttypes()
    {
        return $this->hasMany(Documenttype::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function materialmasters()
    {
        return $this->hasMany(Materialmaster::class);
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
