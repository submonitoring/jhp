<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $kelurahan_code
 * @property string|null $kelurahan
 * @property int|null $kecamatan_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kodepos> $allKodepos
 * @property-read int|null $all_kodepos_count
 * @property-read \App\Models\Kecamatan|null $kecamatan
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereKecamatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereKelurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereKelurahanCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Kelurahan extends Model
{
    use HasFactory;

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function allKodepos()
    {
        return $this->hasMany(Kodepos::class);
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
